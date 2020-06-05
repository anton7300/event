<?php

namespace App\Http\Controllers;

use App\Services\Api\LocalizationApi;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        return (new LocalizationApi)->index($locale);
    }
}