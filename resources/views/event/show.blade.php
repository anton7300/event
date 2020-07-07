@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <div class="block event_top_content flex">
                    <img class="event_img" src="@if($event->logo) {{ Storage::url($event->logo) }} @else {{ Storage::url('img/not-image.png') }} @endif">
                    <div class="event_main_content">
                        <div class="flex_between">
                            <h1 class="event_title">{{ $event->name }}</h1>
                            <div class="event_like flex_center">
                                <span>{{ $likes }}</span>
                                @auth
                                    <form method="POST" action="{{ route('event.like', ['event' => $event->id]) }}">
                                        @csrf

                                        <button type="submit">@if($like) not like @else like @endif</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <p class="event_description_short">{{ $event->description_short }}</p>
                        <div class="event_subscribe flex_center">
                            <span>{{ $eventSubscribers }}</span>
                            @auth
                                <form method="POST" action="{{ route('event.subscribe', ['event' => $event->id]) }}">
                                    @csrf

                                    <button type="submit">@if($eventSubscriber) unsubscribe @else subscribe @endif</button>
                                </form>
                            @endauth
                        </div>

                    </div>
                </div>
                <div class="block">
                    {{ $event->description }}
                </div>
            </div>
            <div class="sidebar sidebar_right">
                <div class="block">
                    <p class="event_date">{{ $event->date }}</p>
                    <p class="event_param">{{ $event->location }}</p>
                    <p class="event_param">{{ $event->interest_id }}</p>
                    <p class="event_param">{{ $event->age_from }}</p>
                    <p class="event_param">{{ $event->age_to }}</p>
                    <p class="event_param">{{ $event->gender }}</p>
                    <p class="event_param">{{ $event->count_users }}</p>
                    <p class="event_param">{{ $event->type }}</p>
                </div>
                <div class="block">
                    <a href="{{ route('user.show', ['user' => $creator->id]) }}">{{ $creator->name }}</a>

                    @auth
                        <form method="POST" action="{{ route('user.subscribe', ['user' => $creator->id]) }}">
                            @csrf

                            <button type="submit">@if($creator->subscribers_count) unsubscribe @else subscribe @endif</button>
                        </form>
                    @endauth
                </div>

                @auth
                    <div class="block">
                        <form method="POST" action="{{ route('ticket.buy') }}">
                            @csrf

                            @if(count($tickets) > 1)
                                <select name="ticket">
                                    @foreach($tickets as $ticket)
                                        <option value="{{ $ticket->id }}">{{ $ticket->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input name="ticket" hidden value="{{ $tickets[0]->id }}">
                            @endif

                            <select name="currency">
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                @endforeach
                            </select>

                            @if(count($places) > 1)
                                <select name="place">
                                    @foreach($places as $place)
                                        <option value="{{ $place }}">{{ $place }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input name="place" hidden value="{{ $places[0] }}">
                                {{ $places[0] }}
                            @endif

                            <button type="submit">buy</button>
                        </form>
                    </div>
                @endauth

                @auth
                    <div class="block">
                        @include('parts.chat')
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection