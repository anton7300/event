@extends('layouts.app')

@section('content')    <div class="container">
    <div class="container_page_sidebar">
        <div class="sidebar sidebar_left">
            @include('parts.left-menu')
        </div>
        <div class="content">
            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                @csrf

                <input type="file" accept="image/jpeg,image/png" name="img" value="{{ old('img') }}" require>
                @error('img')
                {{ $message }}
                @enderror

                <input name="link" value="{{ old('link') }}" placeholder="link">
                @error('link')
                {{ $message }}
                @enderror

                <input name="title" value="{{ old('title') }}" placeholder="title">
                @error('title')
                {{ $message }}
                @enderror

                <textarea name="description" placeholder="description">{{ old('description') }}</textarea>
                @error('description')
                {{ $message }}
                @enderror

                <button type="submit">create</button>
            </form>
        </div>
        <div class="sidebar sidebar_right">
            <a href="{{ route('banner.create') }}">create</a>
        </div>
    </div>
</div>
@endsection