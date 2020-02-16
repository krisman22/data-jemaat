@extends('layouts.app')

@section('content')
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>University Earnings</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>All Earnings are in million $</p>
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
                categories: [
                    '<2018',
                    '2018',
                    '2019',
                    '2020'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Orang'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                data: [49.9, 71.5, 106.4, 129.2]

            }, {
                name: 'Perempuan',
                data: [83.6, 78.8, 98.5, 93.4]

            }]
        });
    </script>
@endsection