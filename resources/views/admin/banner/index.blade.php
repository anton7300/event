@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @foreach ($banners as $item)
                    <div class="block">
                        <img class="banner_item_img" src="@if($item->img) {{ Storage::url($item->img) }} @else {{ Storage::url('img/not-image.png') }} @endif">
                        <a href="{{ route('banner.edit', ['banner' => $item->id]) }}">Edit</a>
                        <form method="post" action="{{ route('banner.destroy', ['banner' => $item->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('banner.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection