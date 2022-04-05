<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/restyle.css') }}">

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    @yield('style')
</head>
<body style="overflow: auto ; margin-right: 0;">
<!-- Page Heading -->

@include('layouts.navigation')

<!-- Page Content -->
<main>
    @yield('content')
</main>

<!--  Cart script  -->

@include('layouts.footer')


@yield('script')
@yield('scripts')
@include('layouts.script')
@include('components.mobile-nav')
</body>
</html>
