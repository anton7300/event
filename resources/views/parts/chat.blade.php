@if(auth()->check())
    <p>Chat</p>
    <chat-event :chatid="{{ $chat->id }}" :user="{{ auth()->user() }}"></chat-event>
@endif