@extends('cms.index')

@section('page_css')
@endsection

@section('content')
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <li class="xn-icon-button pull-right last">
                <a href="#" onclick="history.back()" class="mb-control"><span class="fa fa-arrow-left"></span></a>
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
        </ul>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('cms/pages') }}">Pages</a></li>
            @if($parent)
                <li><a href="{{ url('cms/pages/subpages/'.$parent->id) }}">{{ $parent->title }}</a></li>
            @endif
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>{{ $page->title }}</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tabs">
                                <ul class="nav nav-tabs" id="widgetNavigation">
                                    <li class="minw140 active"><a href="#tabGeneral" data-toggle="tab">Content</a></li>
                                    @foreach($allWidgets as $widget)
                                        @if($widget->title == "Carousels")
                                            <li class="minw140"><a href="#tabCarousels" data-toggle="tab">{{ $widget->title }}</a></li>
                                        @elseif($widget->title == "Galleries" && $page->multiplicity == '0' && ($page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
                                            <li class="minw140"><a href="#tabGalleries" data-toggle="tab">{{ $widget->title }}</a></li>
                                        @elseif($widget->title == "Videos" && $page->multiplicity == '0' && ($page->category == 'base' || $page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
                                            <li class="minw140"><a href="#tabVideos" data-toggle="tab">{{ $widget->title }}</a></li>
                                        @elseif($widget->title == "Locations" && $page->multiplicity == '0' && ($page->category == 'contact'))
                                            <li class="minw140"><a href="#tabLocations" data-toggle="tab">{{ $widget->title }}</a></li>
                                        @elseif($widget->title == "Schedules" && $page->multiplicity == '0' && ($page->category == 'programs'))
                                            <li class="minw140"><a href="#tabSchedules" data-toggle="tab">{{ $widget->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                                <hr>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabGeneral">
                                        @include('cms.pages.edit.base.standard')
                                    </div>
                                    @foreach($allWidgets as $widget)
                                        @if($widget->title == "Carousels")
                                            <div class="tab-pane" id="tabCarousels">
                                                @include('cms/pages/edit/carousels/partials/standard')
                                            </div>
                                        @elseif($widget->title == "Galleries" && $page->multiplicity == '0' && ($page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
                                            <div class="tab-pane" id="tabGalleries">
                                                @include('cms/pages/edit/galleries/partials/standard')
                                            </div>
                                        @elseif($widget->title == "Videos" && $page->multiplicity == '0' && ($page->category == 'base' || $page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
                                            <div class="tab-pane" id="tabVideos">
                                                @include('cms/pages/edit/videos/partials/standard')
                                            </div>
                                        @elseif($widget->title == "Locations" && $page->multiplicity == '0' && ($page->category == 'contact'))
                                            <div class="tab-pane" id="tabLocations">
                                                @include('cms/pages/edit/locations/partials/standard')
                                            </div>
                                        @elseif($widget->title == "Schedules" && $page->multiplicity == '0' && ($page->category == 'programs'))
                                            <div class="tab-pane" id="tabSchedules">
                                                @include('cms/pages/edit/schedules/partials/standard')
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->

    <!-- MODALS WIDGETS -->
    @foreach($allWidgets as $widget)
        @if($widget->title == "Carousels")
            @include('cms/pages/edit/carousels/modals/add')
            @include('cms/pages/edit/carousels/modals/addFragments')
            @include('cms/pages/edit/carousels/modals/editFragments')
        @elseif($widget->title == "Galleries" && $page->multiplicity == '0' && ($page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
            @include('cms/pages/edit/galleries/modals/add')
            @include('cms/pages/edit/galleries/modals/addFragments')
            @include('cms/pages/edit/galleries/modals/editFragments')
        @elseif($widget->title == "Videos" && $page->multiplicity == '0' && ($page->category == 'base' || $page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
            @include('cms/pages/edit/videos/modals/add')
            @include('cms/pages/edit/videos/modals/edit')
        @elseif($widget->title == "Locations" && $page->multiplicity == '0' && ($page->category == 'contact'))
            @include('cms/pages/edit/locations/modals/add')
            @include('cms/pages/edit/locations/modals/edit')
        @elseif($widget->title == "Schedules" && $page->multiplicity == '0' && ($page->category == 'programs'))
            @include('cms/pages/edit/schedules/modals/add')
            @include('cms/pages/edit/schedules/modals/import')
            @include('cms/pages/edit/schedules/modals/edit')
        @endif
    @endforeach

@endsection

@section('page_js')
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/fileinput/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/owl/owl.carousel.min.js') }}"></script>

    @foreach($allWidgets as $widget)
        @if($widget->title == "Carousels")
            @include('cms/pages/edit/carousels/javascript/standard')
            @include('cms/pages/edit/carousels/javascript/edit')
            @include('cms/pages/edit/carousels/javascript/sort')
            @include('cms/pages/edit/carousels/javascript/delete')
        @elseif($widget->title == "Galleries" && $page->multiplicity == '0' && ($page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
            @include('cms/pages/edit/galleries/javascript/standard')
            @include('cms/pages/edit/galleries/javascript/edit')
            @include('cms/pages/edit/galleries/javascript/sort')
            @include('cms/pages/edit/galleries/javascript/delete')
        @elseif($widget->title == "Videos" && $page->multiplicity == '0' && ($page->category == 'base' || $page->category == 'news' || $page->category == 'stories' || $page->category == 'highlights' || $page->category == 'shows' || $page->category == 'about'))
            @include('cms/pages/edit/videos/javascript/standard')
            @include('cms/pages/edit/videos/javascript/edit')
            @include('cms/pages/edit/videos/javascript/sort')
            @include('cms/pages/edit/videos/javascript/delete')
        @elseif($widget->title == "Locations" && $page->multiplicity == '0' && ($page->category == 'contact'))
            @include('cms/pages/edit/locations/javascript/standard')
            @include('cms/pages/edit/locations/javascript/edit')
            @include('cms/pages/edit/locations/javascript/sort')
            @include('cms/pages/edit/locations/javascript/delete')
        @elseif($widget->title == "Schedules" && $page->multiplicity == '0' && ($page->category == 'programs'))
            @include('cms/pages/edit/schedules/javascript/standard')
            @include('cms/pages/edit/schedules/javascript/edit')
            @include('cms/pages/edit/schedules/javascript/delete')
        @endif
    @endforeach

    <script>
        $('#widgetNavigation  a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $("ul.nav-tabs#widgetNavigation > li > a").on("shown.bs.tab", function(e) {
            var id = $(e.target).attr("href");
            localStorage.setItem('selectedTab', id)
        });
        var selectedTab = localStorage.getItem('selectedTab');
        $('#widgetNavigation a[href="' + selectedTab + '"]').tab('show');

        $( ".released-at-date" ).change(function() {
            var date = $( ".released-at-date" ).val();
            var time = $( ".released-at-time" ).val();

            $( ".released-at-form" ).val(date + ' ' + time);
        });

        $( ".released-at-time" ).change(function() {
            var date = $( ".released-at-date" ).val();
            var time = $( ".released-at-time" ).val();

            $( ".released-at-form" ).val(date + ' ' + time);
        });

        $( ".emitted-at-date" ).change(function() {
            var date = $( ".emitted-at-date" ).val();
            var time = $( ".emitted-at-time" ).val();

            $( ".emitted-at-form" ).val(date + ' ' + time);
        });

        $( ".emitted-at-time" ).change(function() {
            var date = $( ".emitted-at-date" ).val();
            var time = $( ".emitted-at-time" ).val();

            $( ".emitted-at-form" ).val(date + ' ' + time);
        });

    </script>

@endsection