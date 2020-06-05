<?php

namespace App\Http\Controllers;

use App\Interest;
use App\InterestCat;
use Illuminate\Http\Request;

class InterestCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interestCats = InterestCat::get();

        return view('admin.interestCat.index', [
            'interestCats' => $interestCats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interestCat.create');
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
            'name' => ['required', 'string']
        ]);

        $data = $request->all();

        InterestCat::create($data);

        return redirect()->route('interest-cat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InterestCat  $interestCat
     * @return \Illuminate\Http\Response
     */
    public function show(InterestCat $interestCat)
    {
        return redirect( route('interest-cat.index') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InterestCat  $interestCat
     * @return \Illuminate\Http\Response
     */
    public function edit(InterestCat $interestCat)
    {
        return view('admin.interestCat.edit', [
            'interestCat' => $interestCat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InterestCat  $interestCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InterestCat $interestCat)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $data = $request->all();

        $interestCat->update($data);

        return redirect()->route('interest-cat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InterestCat  $interestCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterestCat $interestCat)
    {
        $interestCat->delete();

        return redirect()->route('interest-cat.index');
    }
}
