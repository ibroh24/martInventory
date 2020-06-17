@extends('layouts.master')
@section('title')
    Faajs | Dashboard
@endsection

@section('breadcrumb')
    Dashboard
@endsection
@section('menuname')
    Business Intelligence 
@endsection
@section('submenu')
    Dashboard
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

        <div class="col-lg-3 col-md-6">
            <div class="card-box widget-box-two widget-two-info">
                <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                <div class="wigdet-two-content text-white">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Statistics</p>
                    <h2 class="text-white"><span data-plugin="counterup">34578</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                    <p class="m-0"><b>Last:</b> 30.4k</p>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box widget-box-two widget-two-primary">
                <i class="mdi mdi-layers widget-two-icon"></i>
                <div class="wigdet-two-content text-white">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">User This Month</p>
                    <h2 class="text-white"><span data-plugin="counterup">52410 </span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                    <p class="m-0"><b>Last:</b> 40.33k</p>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box widget-box-two widget-two-danger">
                <i class="mdi mdi-access-point-network widget-two-icon"></i>
                <div class="wigdet-two-content text-white">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Statistics</p>
                    <h2 class="text-white"><span data-plugin="counterup">6352</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                    <p class="m-0"><b>Last:</b> 30.4k</p>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box widget-box-two widget-two-success">
                <i class="mdi mdi-account-convert widget-two-icon"></i>
                <div class="wigdet-two-content text-white">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">User Today</p>
                    <h2 class="text-white"><span data-plugin="counterup">895 </span> <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                    <p class="m-0"><b>Last:</b> 1250</p>
                </div>
            </div>
        </div><!-- end col -->
    </div>
      

    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Total Revenue</h4>

                <div id="website-stats" style="height: 320px;" class="flot-chart"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title m-t-0">Sales Analytics</h4>

                <div class="pull-right m-b-30">
                    <div id="reportrange" class="form-control">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span></span>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div id="donut-chart">
                    <div id="donut-chart-container" class="flot-chart" style="height: 240px;">
                    </div>
                </div>

                <p class="text-muted m-b-0 m-t-15 font-13 text-overflow">Pie chart is used to see the proprotion of each data groups, making Flot pie chart is pretty simple, in order to make pie chart you have to incldue jquery.flot.pie.js plugin.</p>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
$('#reportrange').daterangepicker({
    format: 'MM/DD/YYYY',
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),
    minDate: '01/01/2012',
    maxDate: '12/31/2016',
    dateLimit: {
        days: 60
    },
    showDropdowns: true,
    showWeekNumbers: true,
    timePicker: false,
    timePickerIncrement: 1,
    timePicker12Hour: true,
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    opens: 'left',
    drops: 'down',
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-success',
    cancelClass: 'btn-default',
    separator: ' to ',
    locale: {
        applyLabel: 'Submit',
        cancelLabel: 'Cancel',
        fromLabel: 'From',
        toLabel: 'To',
        customRangeLabel: 'Custom',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
    }
}, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
});


</script>
    
@endsection