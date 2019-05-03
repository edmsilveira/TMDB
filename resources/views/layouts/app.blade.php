<!doctype html>
@php
    $env = ENV('APP_ENV');
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, minimum-scale=1.0, user-scalable=yes">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#008dc9">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        
        @if($env === 'local')
        <link rel="stylesheet" type="text/css" href="https://transainc.github.io/sonata/css/sonata-development.min.css">
        @else
        <link rel="stylesheet" type="text/css" href="https://transainc.github.io/sonata/css/sonata.min.css">
        @endif
        @yield('styles')
    </head>
    <body>
        <h1 class="_hdn">@yield('title')</h1>

        <main>
            @yield('main')
        </main>

        @yield('scripts')
    </body>
</html>
