<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" href="{{ url('assets/img/favicon.ico') }}">
	<title>Online Support System | @yield('title')</title>
        @include('libraries.app.styles')
        @stack('css')
        <style>

        </style>
    </head>
  <body>
        @include('components.app.nav')
        <div id="overlay" style="display: block;">
            <div class="loader"></div>
        </div>
        @yield('content')

        @include('components.app.footer')
        @include('libraries.app.scripts')
        @stack('js')
  </body>
</html>
