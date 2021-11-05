<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("title")</title>
        <link rel="stylesheet" href="{{ asset('css/bulma.css?ver=1.2') }}">
        <link rel="stylesheet" media="" href="{{ asset('css/app.css?ver=1.2') . \Illuminate\Support\Str::random(5) }} }}">
        <link rel="stylesheet" class="dark-css" media="none" href="{{ asset('css/dark.css?ver=1.2') . \Illuminate\Support\Str::random(5) }} }}">
        <link rel="stylesheet" class="light-css" media="" href="{{ asset('css/light.css?ver=1.2') . \Illuminate\Support\Str::random(5) }} }}">
    </head>
    <body>

    <div id="app">
        <div class="main">
            @yield("content")
        </div>
    </div>
    @include("layouts.footer")
    <script src="{{ asset('js/my_script.js?ver=') . \Illuminate\Support\Str::random(5) }}"></script>
    @yield('js')
    </body>
</html>
