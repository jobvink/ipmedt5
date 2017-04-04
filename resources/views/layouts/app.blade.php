<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    {{--Navigatie (header) in nav.blade gezet en wordt op elke pagina geinclude--}}
    @include('layouts.nav')

    {{--Demo.blade toegevoegd --> welkomstbericht--}}
        @yield('demo')

    {{--Alle 'content' sections worden hierdoor uitgelijnd--}}
        <div class="container">
            @yield('content')
        </div>

    {{--'tabel' section in rack/show.blade niet in div omdat tabel + tekst anders niet mooi wordt uitgelijnd--}}
        @yield('tabel')

    {{--'articletable' section in article/show.blade--}}
        @yield('articletable')

        @yield('logout')
    {{--Footer in includes in footer.blade en wordt in elke pagina geinclude--}}
    {{--@include('includes.footer')--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footerscripts')
</body>
</html>
