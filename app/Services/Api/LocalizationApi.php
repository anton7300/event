<?php

namespace App\Services\Api;

use App\User;
use Session;

class LocalizationApi
{
    public function index($locale)
    {
        app()->setLocale($locale);

        if (auth()->check())
            User::where('id', auth()->user()->id)->update(['locale' => $locale]);

        Session::put('locale', $locale);

        return redirect()->back();
    }
}