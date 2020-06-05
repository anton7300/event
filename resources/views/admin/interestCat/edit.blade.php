@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('interest-cat.update', ['interest_cat' => $interestCat->id]) }}">
                    @method('PUT')
                    @csrf

                    <input name="name" value="{{ $interestCat->name }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <button type="submit">edit</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest-cat.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection