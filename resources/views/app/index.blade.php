<!doctype html>
<html class="no-js" lang="hr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

        @yield('meta')

        <!-- FAVICONS -->
        @include('app.partials.favicons')

        <!-- STYLE -->
        @include('app.partials.styles')
        <link rel="stylesheet" href="//releases.flowplayer.org/7.0.4/commercial/skin/skin.css">
    </head>
    <body>
        <!-- LOADER -->
        @include('app.partials.loader')

        <!-- CONTENT -->
        @yield('content')


        <!-- FOOTER -->
        @include('app.partials.footer')

        <!-- COOKIE POLICTY -->
        @include('app.partials.cookie-policy')


        <!-- SCROLL TO TOP -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>

        <!-- LIBRARIES -->
        @include('app.partials.libraries')

        <!-- SCRIPTS -->
        @include('app.partials.scripts')
    </body>
</html>