<div class="user_item">
    <a href="{{ route('user.show', ['user' => $item->id]) }}" class="flex">
        <img class="user_item_img" src="@if($item->logo) {{ Storage::url($item->logo) }} @else {{ Storage::url('img/not-image.png') }} @endif">
        <div class="user_item_content">
            <p class="user_item_name">{{ $item->name }}</p>
            <p class="user_item_param">{{ $item->location }}</p>
        </div>
    </a>
</div>