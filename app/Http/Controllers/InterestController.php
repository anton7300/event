<?php

namespace App\Http\Controllers;

use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::get();

        return view('admin.interest.index', [
            'interests' => $interests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interestCats = InterestCat::get(['id', 'name']);

        return view('admin.interest.create', [
            'interestCats' => $interestCats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cat_id' => ['nullable', 'exists:interest_cats,id']
        ]);

        $data = $request->all();

        Interest::create($data);

        return redirect()->route('interest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        return redirect( route('interest.index') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Interest $interest)
    {
        $interestCats = InterestCat::get(['id', 'name']);

        return view('admin.interest.edit', [
            'interest' => $interest,
            'interestCats' => $interestCats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interest $interest)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cat_id' => ['nullable', 'exists:interest_cats,id']
        ]);

        $data = $request->all();

        $interest->update($data);

        return redirect()->route('interest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        $interest->delete();

        return redirect()->route('interest.index');
    }
}
