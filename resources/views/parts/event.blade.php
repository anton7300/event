<div class="event_item">
    <a href="{{ route('event.show', ['event' => $item->id]) }}">
        <img class="event_item_img" src="@if($item->logo) {{ Storage::url($item->logo) }} @else {{ Storage::url('img/not-image.png') }} @endif">
        <p class="event_item_title">{{ $item->name }}</p>
    </a>
    <p class="event_item_short_desc">{{ $item->description_short }}</p>
    <div class="event_item_like">
        <p class="event_item_like_count">likes: <span>{{ $item->likes_count }}</span></p>
        @auth
            <form method="POST" action="{{ route('event.like', ['event' => $item->id]) }}">
                @csrf

                <button type="submit">@if(count($item->likes)) not like @else like @endif</button>
            </form>
        @endauth
    </div>
    <div class="event_item_subscriber">
        <p class="event_item_subscriber_count">subscribers: <span>{{ $item->subscribers_count }}</span></p>
        @auth
            <form method="POST" action="{{ route('event.subscribe', ['event' => $item->id]) }}">
                @csrf

                <button type="submit">@if(count($item->subscribers)) unsubscribe @else subscribe @endif</button>
            </form>
        @endauth
    </div>
    <a href="{{ route('user.show', ['user' => $item->creator->id]) }}">{{ $item->creator->name }}</a>
</div>