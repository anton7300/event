<?php

namespace App\Services\Api;

use App\Banner;
use App\Event;
use App\Interest;
use App\InterestCat;

class MainApi
{
    public function index()
    {
        $authUser = auth()->check() ? auth()->user()->id : null;

        $banners = Banner::get();

        $eventsPopular = Event::with('creator')
            ->with(['likes' => function ($query) use ($authUser) {
                $query->where('user_id', $authUser);
            }])
            ->withCount('likes')
            ->with(['subscribers' => function ($query) use ($authUser) {
                $query->where('user_id', $authUser);
            }])
            ->withCount('subscribers')
            ->limit(3)
            ->get();

        if (auth()->check()) {
            $eventsSubscribe = Event::whereIn('created_by', auth()->user()->subscriptions()->get())
                ->with('creator')
                ->with(['likes' => function ($query) use ($authUser) {
                    $query->where('user_id', $authUser);
                }])
                ->withCount('likes')
                ->with(['subscribers' => function ($query) use ($authUser) {
                    $query->where('user_id', $authUser);
                }])
                ->withCount('subscribers')
                ->get();

            $user = auth()->user()->profile();
        }

        $interestCats = InterestCat::get(['id', 'name']);

        $interests = Interest::get(['id', 'name', 'cat_id']);

        return [
            'banners' => $banners,
            'eventsPopular' => $eventsPopular,
            'eventsSubscribe' => $eventsSubscribe ?? null,
            'interests' => $interests,
            'interestCats' => $interestCats,
            'user' => $user ?? null
        ];
    }
}
