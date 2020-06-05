<header id="header">
    <div class="container">
        <div class="flex_center_between">
            <a href="{{ route('index') }}">logo</a>

            <div class="container_header_menu flex_center_between">
                <ul class="menu_header">
                    @auth
                        <li><a href="{{ route('event.create') }}">@lang('menu.create_event')</a></li>
                    @endauth

                    <li><a href="{{ route('help') }}">@lang('menu.help')</a></li>

                    @auth
                        <li><a href="{{ route('event.create') }}">@lang('menu.create_event')</a></li>
                        <li><a href="{{ route('user.my-event') }}">@lang('Profile')</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit">@lang('Logout')</button>
                        </form>
                    @else
                        <li><a href="{{ route('login') }}">@lang('Login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('Register')</a></li>
                    @endauth
                </ul>

                <a href="{{ route('locale.set', ['locale' => 'ru']) }}">RU</a>
                <a href="{{ route('locale.set', ['locale' => 'en']) }}">EN</a>
            </div>
        </div>
    </div>
</header>
