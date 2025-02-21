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
  <body onload="hidePreloader();">
        @include('components.app.nav')
        <main class="py-4">
            <div class="container" style="z-index: 2;position: initial">
                @include("layouts.notifications.successes")

                @include("layouts.notifications.messages")

                @include("layouts.notifications.info")

                @include("layouts.notifications.warnings")

                @include("layouts.notifications.errors")

                @include("layouts.notifications.error_string")

                @include("layouts.notifications.error_messages")

            </div>
            {{-- <div id="preloader" class="container" style="position: fixed;z-index: 2;text-align: center;">
                <div class="spinner-frame">
                    <div class="spinner-cover"></div>
                    <div class="spinner-bar"></div>
                </div>
            </div> --}}

            @yield('content')
        </main>
        @include('components.app.admin_areas.tickets.model_views.show')
        @include('components.app.footer')
        @include('libraries.app.scripts')
        @stack('js')
  </body>
</html>
