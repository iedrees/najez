<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=milano,sky,sky-bold,shekari,almawadah,hama,neckar" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cd-themify-icons@0.0.1/index.min.css">
        @livewireStyles
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="bg-gray-100">
        @yield('body')

        <script src="{{ mix('js/app.js') }}"></script>
        @livewireScripts
    </body>
</html>
