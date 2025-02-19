<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>Online Support System | @yield('title')</title>
        @include('libraries.login.styles')
        @stack('css')
    </head>
  <body class="bg-gradient-to-r from-green-400 via-blue-500 to-green-400 min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">
        @yield('content')
        @include('components.login.footer')
        @include('libraries.login.scripts')
        @stack('js')
  </body>
</html>
