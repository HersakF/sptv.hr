<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

    <title>404 | Sportska televizija</title>
    <meta name="Author" content="Sportska televizija" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />

    <!-- FAVICONS -->
    @include('app.partials.favicons')

    <!-- STYLE -->
    @include('app.partials.styles')
</head>
    <body>
        <!-- 404. PAGE NOT FOUND -->
        <section class="bg-primary no-padding mobile-height">
            <div class="container position-relative full-screen">
                <div class="slider-typography text-center">
                    <div class="slider-text-middle-main">
                        <div class="slider-text-middle">
                            <div class="bg-orange-opacity width-80 center-col sm-width-80">
                                <div class="padding-fifteen-all xs-padding-20px-all">
                                    <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom">404</span>
                                    <h6 class="text-uppercase text-white font-weight-600 alt-font display-block margin-30px-bottom">Stranica nije pronađena ili je premještena.</h6>
                                    <a href="{{ url('/') }}" class="btn btn-transparent-white btn-large text-extra-small">Naslovna</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JS LIBS -->
        <script type="text/javascript" src="{{ asset('app/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/modernizr.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/skrollr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/smooth-scroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.appear.js') }}"></script>

        <!--JS PLUGINS-->
        <script type="text/javascript" src="{{ asset('app/js/bootsnav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.nav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/page-scroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/swiper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.count-to.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.stellar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/imagesloaded.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/hamburger-menu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/counter.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.fitvids.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/equalize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/skill.bars.jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/justified-gallery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/jquery.easypiechart.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/instafeed.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/retina.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/js/main.js') }}"></script>
    </body>
</html>