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
                data: {{json_encode($laki)}}

            }, {
                name: 'Perempuan',
                data: {!!json_encode($perempuan)!!}

            }]
        });
    </script>
@endsection