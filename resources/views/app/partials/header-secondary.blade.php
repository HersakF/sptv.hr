<header>
    <nav class="navbar navbar-secondary bg-primary navbar-top full-width-pull-menu no-transition">
        <div class="container nav-header-container height-100px xs-height-80px xs-padding-15px-lr">
            <div class="row">
                <div class="col-lg-2 col-md-2 no-padding sm-padding-15px-lr">
                    <a href="{{ url('/') }}" title="Sportska televizija" class="logo">
                        <img src="{{ asset('app/images/logo_white.png') }}" class="logo-dark" alt="Sportska televizija">
                        <img src="{{ asset('app/images/logo_white.png') }}" class="logo-light default" alt="Sportska televizija">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 text-center hidden-sm hidden-xs no-padding">
                    @if($mainNavigation->count() > 0)
                        <ul id="accordion" class="nav navbar-nav navbar-center">
                            @foreach($mainNavigation as $page)
                                @if($page->category != 'livestream')
                                    <li class=""><a href="{{ '/'.$page->url }}">{{ $page->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-2 col-md-2 text-right hidden-sm hidden-xs no-padding">
                    @if($mainNavigation->count() > 0)
                        <ul id="accordion" class="nav navbar-nav navbar-center">
                            @foreach($mainNavigation as $page)
                                @if($page->category == 'livestream')
                                    <li class=""><a href="{{ '/'.$page->url }}" class="extra"><i class="fa fa-play"></i> {{ $page->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 center-col text-right visible-sm visible-xs">
                    <button class="navbar-toggle mobile-toggle top-0" type="button" id="open-button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="menu-wrap full-screen no-padding">
                        <div class="no-padding bg-primary full-screen text-center">
                            <div class="position-absolute height-100 width-100 overflow-auto">
                                <div class="display-table height-100 width-100">
                                    <div class="display-table-cell height-100 width-100 vertical-align-middle padding-fourteen-lr alt-font link-style-2 sm-padding-seven-lr xs-padding-15px-lr">
                                        @if($mainNavigation->count() > 0)
                                            <ul class="font-weight-600 xs-no-padding-left">
                                                @foreach($mainNavigation as $page)
                                                    <li><a href="{{ '/'.$page->url }}" class="inner-link text-white">{{ $page->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button class="close-button-menu" id="close-button"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>