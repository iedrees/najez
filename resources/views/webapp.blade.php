<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <meta name="url" content="https://{{ env('NAKED_DOMAIN') }}">
        <meta name="naked-domain" content="https://{{ env('NAKED_DOMAIN') }}">
        <meta name="domain" content="{{ config('app.url') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=milano,sky,sky-bold,shekari,almawadah,hama,neckar" />
   
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
        
    </head>

    <body>
         <div id="app">
             <App/>
         </div>
   
        <script src="{{ mix('webapp/js/app.js') }}"></script> 
    </body>
</html>
