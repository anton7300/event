<?php

namespace App\Http\Controllers;

use App\Services\Api\UserApi;

use App\User;
use App\Event;
use App\Dialog;
use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index (Request $request)
    {
        $data = (new UserApi)->index($request);

        return view('user.index', $data);
    }

    public function show (User $user)
    {
        $data = (new UserApi)->show($user);

        return view('user.show', $data);
    }

    public function subscribe(User $user)
    {
        $userId = auth()->user()->id;

        if (!$user->subscribers($userId)->count()) {
            $user->subscribers()->attach($userId);
        } else {
            $user->subscribers()->detach($userId);
        }

        return back();
    }

    public function myEvent ()
    {
        $events = Event::where('created_by', auth()->user()->id)->get();

        return view('user.my-event', [
            'events' => $events
        ]);
    }

    public function myParticipate ()
    {
        $events = auth()->user()->events()->get();

        return view('user.my-participate', [
            'events' => $events
        ]);
    }

    public function personal ()
    {
        $user = auth()->user();

        $user->age = date("d.m.Y", strtotime($user->age));

        $user->interest_id = $user->interests()->get()->pluck('id')->toArray();

        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        return view('user.personal', [
            'user' => $user,
            'interests' => $interests,
            'interestCats' => $interestCats
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validArr = [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png'],
            'age' => ['required', 'date_format:d.m.Y', 'before:today'],
            'gender' => ['required', 'integer', 'between:1,2'],
            'location' => ['nullable', 'string'],
            'interest_id' => ['nullable', 'array']
        ];

        if ($user->email != $request->email)
            $validArr['email'][] = 'unique:users';

        $request->validate($validArr);

        $data = $request->all();

        if (empty($data['password']))
            unset($data['password'], $data['password_confirmation']);
        else
            $data['password'] = Hash::make($data['password']);

        if (!empty($data['logo']))
        $data['logo'] = $request->file('logo')->storeAs(
            'public/img/user', "{$user->id}.jpg"
        );

        $data['age'] = date("Y-m-d", strtotime($data['age']));

        if (!empty($data['interest_id'])) {
            $user->interests()->detach();

            foreach($data['interest_id'] as $item)
                $user->interests()->attach($item);
        }

        $user->update($data);

        return redirect()->route('user.personal');
    }

    public function subscribers ()
    {
        $subscribers = auth()->user()->subscribers()->get();

        return view('user.subscribers', [
            'subscribers' => $subscribers
        ]);
    }

    public function subscriptions ()
    {
        $subscriptions = auth()->user()->subscriptions()->get();

        return view('user.subscriptions', [
            'subscriptions' => $subscriptions
        ]);
    }
}