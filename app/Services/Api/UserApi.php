<?php

namespace App\Services\Api;

use App\User;
use App\Event;
use App\Dialog;
use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApi
{
    public function index (Request $request)
    {
        $request->validate([
            'nickname' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer', 'between:1,120'],
            'age_to' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'location' => ['nullable', 'string'],
            'gender' => ['nullable', 'integer', 'between:1,2'],
            'interest_id' => ['nullable', 'array'],
        ]);

        $usersQuery = User::query();

        if (!empty($request->nickname))
            $usersQuery->where('nickname', 'like', "%{$request->nickname}%");

        if (!empty($request->name))
            $usersQuery->where('name', 'like', "%{$request->name}%");

        if (!empty($request->age_from)) {
            $age_from = date("Y-m-d", strtotime("-{$request->age_from} years"));

            $usersQuery->where('age', '<=', $age_from);
        }

        if (!empty($request->age_to)) {
            $age_to = date("Y-m-d", strtotime("-{$request->age_to} years"));

            $usersQuery->where('age', '>=', $age_to);
        }

        if (!empty($request->location))
            $usersQuery->where('location', 'like', "%{$request->location}%");

        if (!empty($request->gender))
            $usersQuery->where('gender', $request->gender);

        if (!empty($request->interest_id[0]))
            $usersQuery->whereHas('interests', function ($query) use ($request) {
                $query->whereIn('interest_id', $request->interest_id);
            });

        $users = $usersQuery->get();

        $interestCats = InterestCat::get(['id', 'name']);
        $interests = Interest::get(['id', 'name', 'cat_id']);

        return [
            'users' => $users,
            'interests' => $interests,
            'interestCats' => $interestCats
        ];
    }

    public function show (User $user)
    {
        $userAuth = auth()->check() ? auth()->user()->id : null;

        $events = $user->events()->withCount('likes')->withCount('subscribers')->get();

        $return = [
            'user' => $user,
            'events' => $events
        ];

        if ($userAuth) {
            $subscribe = $user->subscribers($userAuth)->count();

            $dialog = Dialog::query()
                ->join('dialog_user', 'dialog_user.dialog_id', '=', 'dialogs.id')
                ->select('dialogs.*')
                ->where('user_id', $user->id)
                ->orWhere('user_id', $userAuth)
                ->groupBy('dialog_id')
                ->havingRaw('COUNT(dialog_id) = 2')
                ->first();

            $return['subscribe'] = $subscribe;
            $return['dialog'] = $dialog;
        }

        return $return;
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