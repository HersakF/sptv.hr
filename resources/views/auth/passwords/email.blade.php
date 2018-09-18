<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <title>Fleo. CMS - Zaboravili ste lozinku?</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('cms/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('cms/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('cms/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('cms/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('cms/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('cms/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('cms/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('cms/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('cms/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('cms/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('cms/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('cms/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('cms/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('cms/favicons/apple-icon-57x57.png') }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('cms/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('cms/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/joli/css/theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/joli/css/main.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="login-container ">
    <div class="login-box animated fadeInDown">
        <div class="row g-mt-10 g-mb-10">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-sm-offset-2 col-sm-offset-2 col-xs-offset-2">
                <img class="img-responsive center-block" src="{{ asset('cms/images/logo.png') }}">
            </div>
        </div>
        <div class="login-body">
            <div class="row">
                <div class="login-title text-center push-up-10"><strong>Zaboravili ste lozinku?</strong></div>
                @if(Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times white" aria-hidden="true"></span><span class="sr-only">Close</span></button>
                        <strong>Bravo!</strong> {{Session::get('status')}}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email:" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-4 col-sm-offset-4">
                            <button type="submit" class="btn btn-info btn-lg btn-rounded btn-block active">
                                Pošalji
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="login-footer">
            <div class="text-center">
                <a class="btn btn-link btn-block" href="{{ route('login') }}">
                    Prijava
                </a>
                <p class="small">Fleo. CMS © 2017</p>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('cms/joli/js/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cms/joli/js/plugins/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('cms/joli/js/plugins/jquery/jquery-ui.min.js') }}"></script>
</body>
</html>






