@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('banner.update', ['banner' => $banner->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <input type="file" accept="image/jpeg,image/png" name="img" value="{{ $banner->img }}" require>
                    @error('img')
                    {{ $message }}
                    @enderror

                    <input name="link" value="{{ $banner->link }}" placeholder="link">
                    @error('link')
                    {{ $message }}
                    @enderror

                    <input name="title" value="{{ $banner->title }}" placeholder="title">
                    @error('title')
                    {{ $message }}
                    @enderror

                    <textarea name="description" placeholder="description">{{ $banner->description }}</textarea>
                    @error('description')
                    {{ $message }}
                    @enderror

                    <button type="submit">edit</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('banner.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection