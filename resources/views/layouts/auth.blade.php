<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("title")</title>
        @php
            $rnd = \Illuminate\Support\Str::random(5);
        @endphp
        <link rel="stylesheet" href="{{ asset('css/bulma.css?ver=') . $rnd }}">
        <link rel="stylesheet" href="{{ asset('css/app.css?ver=') .$rnd }}">
        <link rel="stylesheet" class="dark-css" media="none" href="{{ asset('css/dark.css?ver=') .$rnd }}">
        <link rel="stylesheet" class="light-css" media="" href="{{ asset('css/light.css?ver=') .$rnd }}">
    </head>
    <body>

    <div id="app">
        <div class="main">
            @yield("content")
        </div>
    </div>
    @include("layouts.footer")
    <script src="{{ asset('js/my_script.js?ver=') .$rnd }}" defer></script>
    @yield('js')
    </body>
</html>
