<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("title", "لوحة التحكم")</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        @livewireStyles
    </head>
    <body>
        <div class="app" id="app">
            <div class="wrapper">
                <x-admin-sidebar />
                <div class="content">
                    <x-admin-navbar />
                    @yield("content")
                </div>
            </div>
        </div>
        <script src="{{ asset('js/admin_scripts.js') }}"></script>
        <script src="{{ asset('js/my_script.js') }}"></script>
        @livewireScripts
        @yield('js')
    </body>
</html>
