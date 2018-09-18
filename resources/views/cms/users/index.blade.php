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
            <li><a href="{{ url('cms/users') }}">Users</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    @include('cms/users/base/partials/standard')
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->

    <!-- ADD MODALS -->
    @include('cms/users/base/modals/add')
    @include('cms/users/base/modals/edit')

@endsection

@section('page_js')
    <script type="text/javascript" src="{{ asset('cms/joli/js/plugins/bootstrap/bootstrap-select.js') }}"></script>

    @include('cms/users/base/javascript/edit')
    @include('cms/users/base/javascript/delete')
@endsection