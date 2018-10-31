<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fleo. | CMS</title>

    @yield('page_css')

    <link href="{{ asset('cms/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/joli/css/theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/joli/css/main.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<div id="loader">
    <div class="centrize">
        <div class="v-center">
            <div id="mask">
                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <path fill="#fe970a" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                    </path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="{{ url('cms/dashboard') }}">
                    <img class="cms-logo" src="{{ asset('cms/images/logo.png') }}">
                </a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <div class="profile">
                    <div class="profile-data">
                        <div class="profile-data-name">{{ $user->name }}</div>
                        <div class="profile-data-title">{{ ucfirst($user->role) }}</div>
                    </div>
                </div>
            </li>
            <li class="{{ Request::is('cms/dashboard*') ? 'active' : '' }}">
                <a href="{{ url('cms/dashboard') }}">
                    <span class="fa fa-tachometer"></span> <span class="xn-text">Dashboard</span>
                </a>
            </li>
            <hr class="nav-separator">
            <li class="{{ Request::is('cms/pages*') ? 'active' : '' }}">
                <a href="{{ url('cms/pages') }}">
                    <span class="fa fa-sitemap"></span> <span class="xn-text">Pages</span>
                </a>
            </li>

            @php $widgets = App\Widgets::where('widgets.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get(); @endphp

            @if($widgets->count() > 1)
                <hr class="nav-separator">
                @foreach($widgets as $widget)
                    @if($widget->title == 'Marketings')
                        <li class="{{ Request::is('cms/marketings*') ? 'active' : '' }}">
                            <a href="{{ url('cms/marketings') }}">
                                <span class="fa fa-star"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Schedules')
                        <li class="{{ Request::is('cms/schedules*') ? 'active' : '' }}">
                            <a href="{{ url('cms/schedules') }}">
                                <span class="fa fa-calendar-check-o"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Photos')
                        <li class="{{ Request::is('cms/photos*') ? 'active' : '' }}">
                            <a href="{{ url('cms/photos') }}">
                                <span class="fa fa-camera"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Carousels')
                        <li class="{{ Request::is('cms/carousels*') ? 'active' : '' }}">
                            <a href="{{ url('cms/carousels') }}">
                                <span class="fa fa-film"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Galleries')
                        <li class="{{ Request::is('cms/galleries*') ? 'active' : '' }}">
                            <a href="{{ url('cms/galleries') }}">
                                <span class="fa fa-picture-o"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Videos')
                        <li class="{{ Request::is('cms/videos*') ? 'active' : '' }}">
                            <a href="{{ url('cms/videos') }}">
                                <span class="fa fa-video-camera"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Locations')
                        <li class="{{ Request::is('cms/locations*') ? 'active' : '' }}">
                            <a href="{{ url('cms/locations') }}">
                                <span class="fa fa-map-marker"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Partners')
                        <li class="{{ Request::is('cms/partners*') ? 'active' : '' }}">
                            <a href="{{ url('cms/partners') }}">
                                <span class="fa fa-thumb-tack"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                    @if($widget->title == 'Files')
                        <li class="{{ Request::is('cms/files*') ? 'active' : '' }}">
                            <a href="{{ url('cms/files') }}">
                                <span class="fa fa-folder"></span> <span class="xn-text">{{ $widget->title }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
            <hr class="nav-separator">
            @if($user->role == 'superadministrator')
                <li class="{{ Request::is('cms/widgets*') ? 'active' : '' }}">
                    <a href="{{ url('cms/widgets') }}">
                        <span class="fa fa-info-circle"></span> <span class="xn-text">Widgets</span>
                    </a>
                </li>
            @endif
            <li class="{{ Request::is('cms/users*') ? 'active' : '' }}">
                <a href="{{ url('cms/users') }}">
                    <span class="fa fa-users"></span> <span class="xn-text">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}" target="_blank">
                    <span class="fa fa-desktop"></span> <span class="xn-text">Go to web</span>
                </a>
            </li>
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    @yield('content')
</div>
<!-- END PAGE CONTAINER -->

    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Logout?</div>
                <div class="mb-content">
                    <p>Are you sure?</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <ul class="list-inline">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success btn-lg">Yes.</button>
                                </form>
                            </li>
                            <li>
                                <button class="btn btn-danger btn-lg mb-control-close">No!</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="message-box message-box-danger animated fadeIn" id="deleteConfirmation">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title">Are you sure?</div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <ul class="list-inline">
                            <li>
                                <form id="deleteItemForm" action="" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success btn-lg">Yes.</button>
                                </form>
                            </li>
                            <li>
                                <button class="btn btn-danger btn-lg mb-control-close">No!</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <audio id="audio-alert" src="{{ asset('cms/joli/audio/alert.mp3') }}" preload="auto"></audio>
    <audio id="audio-fail" src="{{ asset('cms/joli/audio/fail.mp3') }}" preload="auto"></audio>

    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/noty/jquery.noty.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/noty/layouts/topCenter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/noty/layouts/topLeft.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/noty/layouts/topRight.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/noty/themes/default.js') }}"></script>

    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/moment.js') }}"></script>

    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/actions.js') }}"></script>

    <script type="text/javascript" src="{{ asset('cms/joli/ckeditor/build-config.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/ckeditor/lang/en.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#loader').delay(500).fadeOut();
            $('#mask').delay(1000).fadeOut('slow');
        });

        @if(Session::has('message_success'))
            noty({text: '{{Session::get('message_success')}}', layout: 'topRight', type: 'success', timeout: 3000});
        @endif

        @if(Session::has('message_error'))
            noty({text: '{{Session::get('message_error')}}', layout: 'topRight', type: 'error', timeout: 3000});
        @endif

    </script>

    @yield('page_js')

</body>
</html>
