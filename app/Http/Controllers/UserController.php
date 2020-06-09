<?php

namespace App\Http\Controllers;

use App\Services\Api\UserApi;

use App\User;
use App\Event;
use App\Dialog;
use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index (Request $request)
    {
        $data = (new UserApi)->index($request);

        return view('user.index', $data);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show (User $user)
    {
        $data = (new UserApi)->show($user);

        return view('user.show', $data);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(User $user)
    {
        $data = (new UserApi)->subscribe($user);

        return $data;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myEvent ()
    {
        $data = (new UserApi)->myEvent();

        return view('user.my-event', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myParticipate ()
    {
        $data = (new UserApi)->myParticipate();

        return view('user.my-participate', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personal ()
    {
        $data = (new UserApi)->personal();

        return view('user.personal', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = (new UserApi)->update($request);

        return $data;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscribers ()
    {
        $data = (new UserApi)->subscribers();

        return view('user.subscribers', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscriptions ()
    {
        $data = (new UserApi)->subscribers();

        return view('user.subscriptions', $data);
    }
}
