@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @if($users)
                    <div class="block">
                        @each('parts.user', $users, 'item')
                    </div>
                @else
                    <div class="not_result">@lang('not_users')</div>
                @endif
            </div>
            <div class="sidebar sidebar_right">
                @include('parts.userFilter')
            </div>
        </div>
    </div>
@endsection