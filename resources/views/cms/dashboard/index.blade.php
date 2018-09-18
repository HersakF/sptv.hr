@extends('cms.index')

@section('page_css')
@endsection

@section('content')
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <li class="xn-icon-button pull-right last">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
        </ul>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Notes</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>Standard photo dimensions: 1366x768px</p>
                            <p>Square photos dimensions: 768x768px.</p>
                            <p>Marketing photos dimensions: 768x150px.</p>
                            <p>Recommended photo weight: 150KB.</p>
                            <p>Online photoshop: <a href="https://www.photopea.com/" target="_blank">https://www.photopea.com/</a></p>

                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center"><i class="fa fa-file-o"></i></th>
                                    <th>Template</th>
                                    <th class="text-center"><i class="fa fa-download"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-sm-1 text-center">
                                            <i class="fa fa-file-photo-o fa-2x"></i>
                                        </td>
                                        <td class="col-sm-10">
                                            Standard photo template (1366x768px)
                                        </td>
                                        <td class="col-sm-1 text-center">
                                            <a href="{{ asset('cms/templates/template-1366-768.psd') }}" target="_blank" class="btn btn-block btn-lg btn-warning">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 text-center">
                                            <i class="fa fa-file-photo-o fa-2x"></i>
                                        </td>
                                        <td class="col-sm-10">
                                            Square photo template (768x768px)
                                        </td>
                                        <td class="col-sm-1 text-center">
                                            <a href="{{ asset('cms/templates/template-768-768.psd') }}" target="_blank" class="btn btn-block btn-lg btn-warning">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 text-center">
                                            <i class="fa fa-file-photo-o fa-2x"></i>
                                        </td>
                                        <td class="col-sm-10">
                                            Marketing photo template (768x150px)
                                        </td>
                                        <td class="col-sm-1 text-center">
                                            <a href="{{ asset('cms/templates/marketing-768-150.psd') }}" target="_blank" class="btn btn-block btn-lg btn-warning">Download</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection

@section('page_js')
@endsection