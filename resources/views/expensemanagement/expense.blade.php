@extends('layouts.app')
@section("page-css")
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@stop
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Expense Management > Expense
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
                            <i class="icon-user font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze">Expense</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <table class="table table-bordered table-hover">
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Entry Date</th>
                                    <th>Created At</th>
                                    <tbody id="expense_list">

                                    </tbody>
                                </table>
                                <a class="btn btn-default pull-right" onclick="add();"> Add Expense </a>
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
@include('components.manageexpense')
@endsection
@section("page-script")
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/pages/scripts/ui-modals.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/pages/scripts/components-date-time-pickers.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/pages/scripts/ui-confirmations.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/expense.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@stop
