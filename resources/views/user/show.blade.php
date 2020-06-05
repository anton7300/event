@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <div class="block flex">
                    <img class="user_img" src="@if($user->logo) {{ Storage::url($user->logo) }} @else {{ Storage::url('img/not-image.png') }} @endif">
                    <div class="user_main_content">
                        <h1>{{ $user->name }}</h1>
                        <p>{{ $user->gender }}</p>
                        <p>{{ $user->location }}</p>
                    </div>
                </div>

                @if($events)
                    <p class="title_block">@lang('user.user_events')</p>
                    <div class="block flex_list">
                        @each('parts.eventMini', $events, 'item')
                    </div>
                @endif
            </div>
            <div class="sidebar sidebar_right">
                @if(auth()->check() && $user->id != auth()->user()->id)
                    <form method="POST" action="{{ route('user.subscribe', ['user' => $user->id]) }}">
                        @csrf

                        <button type="submit">@if($subscribe) unsubscribe @else subscribe @endif</button>
                    </form>

                    @if($dialog)
                        <a href="{{ route('dialog.show', ['dialog' => $dialog->id]) }}">send message</a>
                    @else
                        <form method="POST" action="{{ route('dialog.create', ['user' => $user->id]) }}">
                            @csrf

                            <button type="submit">send message</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection