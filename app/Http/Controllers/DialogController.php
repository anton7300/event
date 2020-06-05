<?php

namespace App\Http\Controllers;

use App\Dialog;
use App\User;

class DialogController extends Controller
{
    public function index ()
    {
        $dialogs = auth()->user()->dialogs()->with(['users' => function ($query) {
            $query->where('user_id', '!=', auth()->user()->id);
        }])->get();

        return view('dialog.index', [
            'dialogs' => $dialogs
        ]);
    }

    public function show (Dialog $dialog)
    {
        return view('dialog.show', [
            'dialog' => $dialog
        ]);
    }

    public function create (User $user)
    {
        if (auth()->user()->id === $user->id)
            return back();

        $dialog = auth()->user()->dialogs()->create();

        $user->dialogs()->attach($dialog->id);

        return redirect()->route('dialog.show', ['dialog' => $dialog->id]);
    }
}
