<?php

namespace App\Http\Controllers;

use App\Services\Api\Main;

class IndexController extends Controller
{
    public function index()
    {
        $data = (new Main)->index();

        return view('index', $data);
    }
}
