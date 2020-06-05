@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                @if($events)
                    <div class="block">
                        @each('parts.event', $events, 'item')
                    </div>
                @else
                    <div class="not_result">@lang('not_events')</div>
                @endif
            </div>
            <div class="sidebar sidebar_right">
                @include('parts.eventFilter')
            </div>
        </div>
    </div>
@endsection