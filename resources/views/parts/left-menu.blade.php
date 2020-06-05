<ul>
    <li><a href="{{ route('event.index') }}">@lang('menu.events')</a></li>
    <li><a href="{{ route('user.index') }}">@lang('menu.users')</a></li>

    @auth
        <li><a href="{{ route('user.my-participate') }}">@lang('menu.my_participate')</a></li>
        <li><a href="{{ route('user.my-event') }}">@lang('menu.my_event')</a></li>
        <li><a href="{{ route('dialog.index') }}">@lang('menu.my_dialogs')</a></li>
        <li><a href="{{ route('user.personal') }}">@lang('menu.personal')</a></li>
        <li><a href="{{ route('user.my-subscribers') }}">@lang('menu.my_subscribers')</a></li>
        <li><a href="{{ route('user.my-subscriptions') }}">@lang('menu.my_subscriptions')</a></li>

        @if(auth()->user()->permission == 0)
            <li><a href="{{ route('banner.index') }}">@lang('menu.banners')</a></li>
            <li><a href="{{ route('interest.index') }}">@lang('menu.interests')</a></li>
            <li><a href="{{ route('interest-cat.index') }}">@lang('menu.interest_cats')</a></li>
        @endif
    @endauth
</ul>