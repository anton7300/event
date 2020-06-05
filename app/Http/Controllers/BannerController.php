<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();

        return view('admin.banner.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'img' => ['required', 'image', 'mimes:jpeg,png'],
            'link' => ['nullable', 'url'],
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string']
        ]);

        $data = $request->all();

        $bannerLast = Banner::orderBy('id', 'desc')->select('id')->first();
        $lastID = $bannerLast ? $bannerLast['id'] + 1 : 1;

        $data['img'] = $request->file('img')->storeAs(
            'public/img/banner', "{$lastID}.jpg"
        );

        Banner::create($data);

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return redirect( route('banner.index') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'img' => ['required', 'image', 'mimes:jpeg,png'],
            'link' => ['nullable', 'url'],
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string']
        ]);

        $data = $request->all();

        $data['img'] = $request->file('img')->storeAs(
            'public/img/banner', "{$banner->id}.jpg"
        );

        $banner->update($data);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banner.index');
    }
}
