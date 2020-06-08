<?php

namespace App\Http\Controllers;

use App\Services\Api\EventApi;

use App\Event;
use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = (new EventApi)->index($request);

        return view('event.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = (new EventApi)->create();

        return view('event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (new EventApi)->store($request);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = (new EventApi)->show($event);

        return view('event.show', $data);
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
