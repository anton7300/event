<?php

namespace App\Services\Api;

use App\Banner;
use App\Event;
use App\Interest;
use App\InterestCat as InterestCategory;

class MainApi
{
    public function index()
    {
        $authUserId = auth()->check() ? auth()->user()->id : null;

        $banners = Banner::get();

        $eventsPopular = Event::with('creator')
            ->with(['likes' => function ($query) use ($authUserId) {
                $query->where('user_id', $authUserId);
            }])
            ->withCount('likes')
            ->with(['subscribers' => function ($query) use ($authUserId) {
                $query->where('user_id', $authUserId);
            }])
            ->withCount('subscribers')
            ->limit(3)
            ->get();

        if (auth()->check()) {
            $eventsSubscribe = Event::whereIn('created_by', auth()->user()->subscriptions()->get())
                ->with('creator')
                ->with(['likes' => function ($query) use ($authUserId) {
                    $query->where('user_id', $authUserId);
                }])
                ->withCount('likes')
                ->with(['subscribers' => function ($query) use ($authUserId) {
                    $query->where('user_id', $authUserId);
                }])
                ->withCount('subscribers')
                ->get();

            $user = auth()->user()->profile();
        }

        $interestCategories = InterestCategory::get(['id', 'name']);

        $interests = Interest::get(['id', 'name', 'cat_id']);

        return [
            'banners' => $banners,
            'eventsPopular' => $eventsPopular,
            'eventsSubscribe' => $eventsSubscribe ?? null,
            'interests' => $interests,
            'interestCats' => $interestCategories,
            'user' => $user ?? null
        ];
    }
}
