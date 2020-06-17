<header id="header">
    <div class="main_header_block">
        <div class="left_header_block">
            <a class="logo_link" href="{{ route('index') }}">Jammin</a>
            <input type="text" placeholder="search event" class="search">
        </div>
        <div class="right_header_block">
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
            <div class="language_version">
                <a href="{{ route('locale.set', ['locale' => 'ru']) }}">RU</a>
                <a href="{{ route('locale.set', ['locale' => 'en']) }}">EN</a>
            </div>
        </div>
    </div>
</header>
