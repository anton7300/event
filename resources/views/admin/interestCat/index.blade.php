@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @foreach ($interestCats as $item)
                    <div>{{ $item->name }}</div>
                    <a href="{{ route('interest-cat.edit', ['interest_cat' => $item->id]) }}">Edit</a>
                    <form method="post" action="{{ route('interest-cat.destroy', ['interest_cat' => $item->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                    <br>
                @endforeach
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest-cat.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection