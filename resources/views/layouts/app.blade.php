<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> تليد | @yield("title") </title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            @include("components.topNavbar")
            @include("components.mainNavbar")
            <div class="main">
                @yield("content")
            </div>
        </div>
        @include("layouts.footer")
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/my_script.js') }}" defer></script>
        @yield('js')
    </body>
</html>
