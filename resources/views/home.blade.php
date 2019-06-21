@extends('layouts.app')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Dashboard
            <small></small>
        </h1>
        <!-- END PAGE TITLE-->

        <!-- BEGIN PAGE BODY-->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> My Expenses</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table bordered">
                                    <th>Expense Categories</th>
                                    <th>Amount</th>
                                   <tbody id="dashboard-expense-list">

                                   </tbody>
                                </table>
                                
                            </div>
                            <div class="col-md-8">
                                <div id="chart_6" class="chart" style="height: 525px;"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END PAGE BODY-->

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

@endsection
@section("page-script")
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/amcharts/amcharts/amcharts.js') }}"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/amcharts/amcharts/serial.js') }}"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/amcharts/amcharts/pie.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@stop