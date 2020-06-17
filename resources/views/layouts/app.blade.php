<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')

    <body>
        <div id='app'>
            <div class="main_page_first_block">
                @include('layouts.header')
            </div>

            <article>
                @yield('content')
            </article>

            @include('layouts.footer')

            @include('layouts.bottom')
        </div>
    </body>
</html>
