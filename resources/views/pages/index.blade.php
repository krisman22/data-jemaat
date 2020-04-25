@extends('layouts.app')

@section('content')
<div class="widgets-programs-area mg-t-20">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-10">
                <div class="hpanel widget-int-shape responsive-mg-b-30 card-radius card-shadow">
                    <div class="panel-body" style="min-height:109px;">
                        <div class="pull-left">
                            <h2 style="color:#5C6BC0">{{$total_jemaat}}</h2>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <br>
                            <h4 class="stats-title">Total Jemaat</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-10">
                <div class="hpanel widget-int-shape responsive-mg-b-30 card-radius card-shadow">
                    <div class="panel-body" style="min-height:109px;">
                        <div class="pull-left">
                            <h2 style="color:#26A69A">{{$total_kk}}</h2>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <br>
                            <h4 class="stats-title">Total Kepala Keluarga</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-10">
                <div class="hpanel widget-int-shape responsive-mg-b-30 card-radius card-shadow">
                    <div class="panel-body" style="min-height:109px;">
                        <div class="pull-left">
                            <h2 style="color:#9CCC65">{{$total_lingkungan}}</h2>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fas fa-map fa-2x"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <br>
                            <h4 class="stats-title">Total Lingkungan</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-10">
                <div class="hpanel widget-int-shape responsive-mg-b-30 card-radius card-shadow">
                    <div class="panel-body" style="min-height:109px;">
                        <div class="pull-left">
                            <h2 style="color:#FDD835">{{$total_bergabung_thisyear}}</h2>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <br>
                            <h4 class="stats-title">Total Jemaat Bergabung {{$thisyear}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="product-sales-area mg-t-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart card-radius card-shadow">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b></b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div id="dataBaru"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="product-sales-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart card-radius card-shadow">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b></b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div id="chartJemaatBergabung"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartJemaatBergabung', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Chart Data Jemaat Bergabung'
            },
            xAxis: {
                categories: {!!json_encode($years)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Orang'
                }
            },
            tooltip: {
                // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Laki-Laki',
                data: {{json_encode($laki)}},
                color: '#EF5350'
            }, {
                name: 'Perempuan',
                data: {!!json_encode($perempuan)!!},
                color: '#80CBC4'
            }]
        });

        // Highcharts.chart('dataBaru', {
        // title: {
        //     text: 'Solar Employment Growth by Sector, 2010-2016'
        // },

        // subtitle: {
        //     text: 'Source: thesolarfoundation.com'
        // },

        // yAxis: {
        //     title: {
        //         text: 'Number of Employees'
        //     }
        // },

        // xAxis: {
        //     accessibility: {
        //         rangeDescription: 'Range: 2010 to 2017'
        //     }
        // },

        // legend: {
        //     layout: 'vertical',
        //     align: 'right',
        //     verticalAlign: 'middle'
        // },

        // plotOptions: {
        //     series: {
        //         label: {
        //             connectorAllowed: false
        //         },
        //         pointStart: 2010
        //     }
        // },

        // series: [{
        //     name: 'Installation',
        //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        // }, {
        //     name: 'Manufacturing',
        //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        // }, {
        //     name: 'Sales & Distribution',
        //     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        // }, {
        //     name: 'Project Development',
        //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        // }, {
        //     name: 'Other',
        //     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        // }],

        // responsive: {
        //     rules: [{
        //         condition: {
        //             maxWidth: 500
        //         },
        //         chartOptions: {
        //             legend: {
        //                 layout: 'horizontal',
        //                 align: 'center',
        //                 verticalAlign: 'bottom'
        //             }
        //         }
        //     }]
        // }

        // });
    </script>
@endsection