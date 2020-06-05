<?php

namespace App\Http\Controllers;

use App\Services\Api\Help;

class HelpController extends Controller
{
    public function index()
    {
        $data = (new Help)->index();

        return view('help');
    }
}
