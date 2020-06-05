<?php

namespace App\Services\Api;

use App\Event;
use App\Chat;
use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;

class EventApi
{
    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'string'],
            'date_from' => ['nullable', 'date_format:d.m.Y H:i', 'after_or_equal:today'],
            'date_to' => ['nullable', 'date_format:d.m.Y H:i', 'gte:date_from'],
            'location' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'interest_id' => ['nullable', 'array']
        ]);

        $eventQuery = Event::where('is_active', 1)->withCount('likes')->withCount('subscribers');

        if (!empty($request->name))
            $eventQuery->where('name', 'like', "%{$request->name}%");

        if (!empty($request->date_from)) {
            $date_from = date("Y-m-d H:i:s", strtotime($request->date_from));

            $eventQuery->where('date', '>=', $date_from);
        }

        if (!empty($request->date_to)) {
            $date_to = date("Y-m-d H:i:s", strtotime($request->date_to));

            $eventQuery->where('date', '<=', $date_to);
        }

        if (!empty($request->location))
            $eventQuery->where('location', 'like', "%{$request->location}%");

        if (!empty($request->age_from))
            $eventQuery->where('age_to', '<', $request->age_from);

        if (!empty($request->age_to))
            $eventQuery->where('age_from', '<=', $request->age_to);

        if (!empty($request->gender))
            $eventQuery->where('gender', $request->gender);

        if (!empty($request->interest_id[0]))
            $eventQuery->whereIn('interest_id', $request->interest_id);

        $events = $eventQuery->get();

        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        return [
            'events' => $events,
            'interests' => $interests,
            'interestCats' => $interestCats
        ];
    }

    /**
     * @return array
     */
    public function create()
    {
        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        return [
            'interests' => $interests,
            'interestCats' => $interestCats
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'date' => ['required', 'date_format:d.m.Y H:i', 'after_or_equal:today'],
            'location' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png'],
            'description' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120', 'lte:age_to'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'count_users' => ['nullable', 'integer', 'min:1'],
            'interest_id' => ['nullable', 'integer', 'exists:interests,id'],
            'type' => ['required', 'integer', 'between:1,2']
        ]);

        $data = $request->all();

        $data['date'] = date("Y-m-d H:i:s", strtotime($data['date']));
        $data['age_from'] = date("Y-m-d", strtotime("-{$data['age_from']} years"));
        $data['age_to'] = date("Y-m-d", strtotime("-{$data['age_to']} years"));
        $data['created_by'] = auth()->user()->id;

        if (isset($data['logo'])) {
            $eventLast = Event::orderBy('id', 'desc')->select('id')->first();
            $lastID = $eventLast ? $eventLast['id'] + 1 : 1;

            $data['logo'] = $request->file('logo')->storeAs(
                'public/img/event', "{$lastID}.jpg"
            );
        }

        Event::create($data);

        return redirect()->route('user.my-event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $userAuth = auth()->check() ? auth()->user()->id : null;

        $likes = $event->likes()->count();

        $eventSubscribers = $event->subscribers()->count();

        $creator = $event->creator()->withCount(['subscribers' => function ($query) use ($userAuth) {
            $query->where('user_subscriber_id', $userAuth);
        }])->first();

        $return = [
            'event' => $event,
            'creator' => $creator,
            'likes' => $likes,
            'eventSubscribers' => $eventSubscribers
        ];

        if ($userAuth) {
            $like = $event->likes($userAuth)->count();

            $eventSubscriber = $event->subscribers($userAuth)->count();

            $chat = Chat::firstOrCreate(
                ['event_id' => $event->id]
            );

            $return['like'] = $like;
            $return['eventSubscriber'] = $eventSubscriber;
            $return['chat'] = $chat;
        }

        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $now = date("Y-m-d");

        $event->date = date("d.m.Y H:i", strtotime($event->date));
        $event->age_from = date_diff( date_create($now), date_create($event->age_from) )->format('%Y');
        $event->age_to = date_diff( date_create($now), date_create($event->age_to) )->format('%Y');

        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        return view('event.edit', [
            'event' => $event,
            'interests' => $interests,
            'interestCats' => $interestCats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'date' => ['required', 'date_format:d.m.Y H:i', 'after_or_equal:today'],
            'location' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png'],
            'description' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120', 'lte:age_to'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'count_users' => ['nullable', 'integer', 'min:1'],
            'interest_id' => ['nullable', 'integer', 'exists:interests,id'],
            'type' => ['required', 'integer', 'between:1,2'],
            'is_active' => ['required', 'integer', 'between:0,1']
        ]);

        $data = $request->all();

        $data['logo'] = $request->file('logo')->storeAs(
            'public/img/event', "{$event->id}.jpg"
        );

        $data['date'] = date("Y-m-d H:i:s", strtotime($data['date']));
        $data['age_from'] = date("Y-m-d", strtotime("-{$data['age_from']} years"));
        $data['age_to'] = date("Y-m-d", strtotime("-{$data['age_to']} years"));

        $event->update($data);

        return redirect()->route('user.my-event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('user.my-event');
    }

    /**
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Event $event)
    {
        $userId = auth()->user()->id;

        if (!$event->subscribers($userId)->count()) {
            $event->subscribers()->attach($userId);
        } else {
            $event->subscribers()->detach($userId);
        }

        return back();
    }
}
