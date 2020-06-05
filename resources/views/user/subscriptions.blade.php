@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @each('parts.user', $subscriptions, 'item')
            </div>
            <div class="sidebar sidebar_right">
                sidebar
            </div>
        </div>
    </div>
@endsection