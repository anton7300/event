<?php

namespace App\Http\Controllers;

use App\Services\Api\MainApi;

class IndexController extends Controller
{
    public function index()
    {
        $data = (new MainApi)->index();

        return view('index', $data);
    }
}
