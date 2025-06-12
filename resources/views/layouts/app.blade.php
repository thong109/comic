<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Trang chủ')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {!! Html::style('assets/css/app.css') !!}
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <!-- Page Heading -->
    @include('layouts.header')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
    {!! Html::script('assets/js/jquery.min.js') !!}
    {!! Html::script('assets/js/popper.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    @stack('scripts')
</body>

</html>
