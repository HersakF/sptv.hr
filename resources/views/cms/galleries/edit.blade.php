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
            <li><a href="{{ url('cms/galleries') }}">Galleries</a></li>
            <li>{{ $gallery->title }}</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    @include('cms/galleries/edit/partials/standard')
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->

    <!-- ADD MODAL -->
    @include('cms/galleries/edit/modals/add')
    @include('cms/galleries/edit/modals/edit')
@endsection

@section('page_js')
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/fileinput/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap-select.js') }}"></script>

    @include('cms/galleries/edit/javascript/standard')
    @include('cms/galleries/edit/javascript/sort')
    @include('cms/galleries/edit/javascript/delete')
    @include('cms/galleries/edit/javascript/edit')

@endsection