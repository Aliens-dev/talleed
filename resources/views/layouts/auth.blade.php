<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("title")</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/bulma.css?ver=1.2') }}">
        <link rel="stylesheet" class="dark-css" media="none" href="{{ asset('css/dark.css?ver=1.2') }}">
        <link rel="stylesheet" class="light-css" media="" href="{{ asset('css/app.css?ver=1.2') }}">
    </head>
    <body>

    <div id="app">
        <div class="main">
            @yield("content")
        </div>
    </div>
    @include("layouts.footer")
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/my_script.js?ver=1.2') }}"></script>
    @yield('js')
    </body>
</html>
