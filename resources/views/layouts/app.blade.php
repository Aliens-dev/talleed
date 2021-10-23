<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> تليد | @yield("title") </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link rel="stylesheet" href="{{ asset('css/bulma.css?ver=1.3') }}">
        <link rel="stylesheet" class="dark-css" media="none" href="{{ asset('css/dark.css?ver=1.2') }}">
        <link rel="stylesheet" class="light-css" media="" href="{{ asset('css/app.css?ver=1.2') }}">
    </head>
    <body>
        <div id="app">
            <div class="modal search-modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <form class="search-form" action="{{ route('search') }}" method="GET">
                        <label>
                            <img src="{{ asset('assets/img/search.svg') }}" alt="search" />
                        </label>
                        <input type="text" name="search" value="{{ old('search') }}" placeholder="ابحث في الموقع" />
                    </form>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
            @include("components.topNavbar")
            @include("components.mainNavbar")
            <div class="main">
                @yield("content")
            </div>
        </div>
        @include("layouts.footer")
        <script src="{{ asset('js/app.js?ver=1.1') }}"></script>
        <script src="{{ asset('js/my_script.js?ver=1.1') }}" defer></script>
        @yield('js')
    </body>
</html>
