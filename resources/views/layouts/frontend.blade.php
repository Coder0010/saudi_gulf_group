<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ @$seoSection->data['description'] }}">
        <meta name="keywords" content="{{ @$seoSection->data['keywords'] }}">
        <meta property="og:title" content="{{ $seoSection->name }}" />
        <meta property="og:description" content="{{ @$seoSection->data['description'] }}" />
        <meta property="og:keywords" content="{{ @$seoSection->data['keywords'] }}" />
        @if (app()->isProduction())
            <title>{{ $seoSection->name }} | @yield('title')</title>
            <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.gstatic.com" rel="preconnect">
            <link href="//fonts.gstatic.com" rel="dns-prefetch">
            <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        @else
            <title>frontend</title>
        @endif
        <link href="{{ asset('frontend/compiled.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield("content")
        <script src="{{ asset('frontend/compiled.js') }}"></script>
        @yield('js_scripts')
    </body>
</html>
