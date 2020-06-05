@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('interest-cat.store') }}">
                    @csrf

                    <input name="name" value="{{ old('name') }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <button type="submit">create</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest-cat.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection