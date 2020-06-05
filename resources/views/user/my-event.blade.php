@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @each('parts.eventAdmin', $events, 'item')
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('event.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection