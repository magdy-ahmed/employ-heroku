<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
     @yield('title',config('app.name', 'خدمات'))
     </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>


    @yield('style')


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        @yield('navbar',View::make('layouts.components.navbar'))
        <main class="py-4 app-laravel">
            @yield('content')
        </main>
    </div>
</body>
@yield('script')
</html>

