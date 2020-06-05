<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')

    <body>
        <div id='app'>
            @include('layouts.header')

            <article>
                @yield('content')
            </article>

            @include('layouts.footer')

            @include('layouts.bottom')
        </div>
    </body>
</html>
