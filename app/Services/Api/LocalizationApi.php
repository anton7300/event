<?php

namespace App\Services\Api;

use Session;

class LocalizationApi
{
    public function index($locale)
    {
        app()->setLocale($locale);

        if (auth()->check()) {
            $user = auth()->user();
            $user->profile()->update(['locale' => $locale]);
        }

        Session::put('locale', $locale);

        return redirect()->back();
    }
}