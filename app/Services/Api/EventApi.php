<?php

namespace App\Services\Api;

use App\Event;
use App\Chat;
use App\Ticket;
use App\Interest;
use App\InterestCat;
use App\PaymentCurrency;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TagController;
use App\TicketUser;
use App\Http\Controllers\TicketController;
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
            'interestCats' => $interestCats,
            'currencies' => PaymentCurrency::all()
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
            'country' => ['required', 'string'],
            'region' => ['required', 'string'],
            'date' => ['required', 'date_format:d.m.Y H:i', 'after_or_equal:today'],
            'location' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png'],
            'description_short' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120', 'lte:age_to'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'count_users' => ['nullable', 'integer', 'min:1'],
            'interest_id' => ['nullable', 'integer', 'exists:interests,id'],
            'type' => ['required', 'integer', 'between:1,2'],
            'tags' => ['nullable', 'array']
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

        $event = Event::create($data);

        (new TicketController)->create(
            $event,
            [
                'title' => NULL,
                'currency_id' => NULL,
                'count' => NULL,
                'price' => NULL,
                'discount' => NULL,
                'is_place' => NULL,
                'place_img' => NULL
            ]
        );

        (new RegionController())->set($event, $data['country'], $data['region']);

        (new TagController())->set($event, $data['tags']);

        return redirect()->route('user.my-event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return array
     */
    public function show(Event $event)
    {
        $userAuth = auth()->check() ? auth()->user()->id : null;

        $likes = $event->likes()->count();

        $eventSubscribers = $event->subscribers()->count();

        $creator = $event->creator()->withCount(['subscribers' => function ($query) use ($userAuth) {
            $query->where('user_subscriber_id', $userAuth);
        }])->first();

        $weather = (new WeatherController())->get($event);

        $region = $event->region()->first();

        $tags = $event->tags()->get();

        $return = [
            'event' => $event,
            'creator' => $creator,
            'likes' => $likes,
            'eventSubscribers' => $eventSubscribers,
            'tags' => $tags,
            'weather' => $weather,
            'region' => $region
        ];

        if ($userAuth) {
            $like = $event->likes($userAuth)->count();

            $eventSubscriber = $event->subscribers($userAuth)->count();

            $chat = Chat::firstOrCreate(
                ['event_id' => $event->id]
            );

            $return['user'] = auth()->user()->profile();
            $return['like'] = $like;
            $return['eventSubscriber'] = $eventSubscriber;
            $return['chat'] = $chat;
            $return['tickets'] = $event->tickets()->get();
            $return['currencies'] = PaymentCurrency::all();
            $return['places'] = (new TicketController())->getFreePlaces($return['tickets'][0]);
        }

        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return array
     */
    public function edit(Event $event)
    {
        $now = date("Y-m-d");

        $event->date = date("d.m.Y H:i", strtotime($event->date));
        $event->age_from = date_diff( date_create($now), date_create($event->age_from) )->format('%Y');
        $event->age_to = date_diff( date_create($now), date_create($event->age_to) )->format('%Y');

        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        $tags = $event->tags()->get();

        return [
            'event' => $event,
            'interests' => $interests,
            'interestCats' => $interestCats,
            'tags' => $tags
        ];
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
            'country' => ['required', 'string'],
            'region' => ['required', 'string'],
            'date' => ['required', 'date_format:d.m.Y H:i', 'after_or_equal:today'],
            'location' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png'],
            'description_short' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120', 'lte:age_to'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'count_users' => ['nullable', 'integer', 'min:1'],
            'interest_id' => ['nullable', 'integer', 'exists:interests,id'],
            'type' => ['required', 'integer', 'between:1,2'],
            'is_active' => ['required', 'integer', 'between:0,1'],
            'tags' => ['nullable', 'array']
        ]);

        $data = $request->all();

        $data['logo'] = $request->file('logo')->storeAs(
            'public/img/event', "{$event->id}.jpg"
        );

        $data['date'] = date("Y-m-d H:i:s", strtotime($data['date']));
        $data['age_from'] = date("Y-m-d", strtotime("-{$data['age_from']} years"));
        $data['age_to'] = date("Y-m-d", strtotime("-{$data['age_to']} years"));

        $event = $event->update($data);

        (new RegionController())->set($event, $data['country'], $data['region']);

        (new TagController())->set($event, $data['tags']);

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
