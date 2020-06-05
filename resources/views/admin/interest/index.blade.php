@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @foreach ($interests as $item)
                    <div>{{ $item->name }}</div>
                    <a href="{{ route('interest.edit', ['interest' => $item->id]) }}">Edit</a>
                    <form method="post" action="{{ route('interest.destroy', ['interest' => $item->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                    <br>
                @endforeach
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection