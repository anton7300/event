@extends('layouts.app')

@section('content')
    {{--<passport-clients></passport-clients>--}}
    {{--<passport-authorized-clients></passport-authorized-clients>--}}
    {{--<passport-personal-access-tokens></passport-personal-access-tokens>--}}

    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <p class="title_block">@lang('index.popular_events')</p>
                @if($eventsPopular)
                    <div class="block">
                        @each('parts.event', $eventsPopular, 'item')
                    </div>
                @else
                    <div class="not_result">@lang('not_events')</div>
                @endif

                @auth
                    <p class="title_block">@lang('index.subscribe_user_events')</p>
                    @if($eventsSubscribe)
                        <div class="block">
                            @each('parts.event', $eventsSubscribe, 'item')
                        </div>
                    @else
                        <div class="not_result">@lang('not_events')</div>
                    @endif
                @endauth
            </div>
            <div class="sidebar sidebar_right">
                @foreach($banners as $item)
                    <a href="{{ $item->link }}">
                        <img src="{{ Storage::url($item->img) }}">
                        {{ $item->title }}
                        {{ $item->description }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection