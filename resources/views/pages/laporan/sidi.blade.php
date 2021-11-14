@extends('layouts.app')

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Data Sidi</h1>
                        </div>
                    </div>
                    <div class="table-responsive" style="width:100%">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="overflow-x: auto;">
                            <table id="laporan" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle" rowspan="2">No. Ling</th>    
                                        <th style="vertical-align:middle" rowspan="2">Nama Lingkungan</th>
                                        <th style="vertical-align:middle" rowspan="2">Jumlah KK </th>    
                                        <th class="text-center" colspan="3">Jumlah yang sudah di Sidi</th>
                                    </tr>
                                    <tr>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>Jumlah</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                    @foreach ($lingkungan as $d)
                                        <tr>
                                            <td>{{$d->nomor_lingkungan}}</td>
                                            <td>{{$d->nama_lingkungan}}</td>
                                            <td>{{$jumlahKK[$d->nomor_lingkungan]['jumlahKK']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['l']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['p']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['l'] + $jumlahJiwa[$d->nomor_lingkungan]['dewasa']['p'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#laporan').DataTable( {
            dom : 'Bfrtip',
            "scrollX": true,
            "paging" : false,
            "ordering" : false,
            "searching" : true,
            buttons : [
                'copyHtml5',
                'excelHtml5',
                {
                    text: 'Nama Sudah Sidi',
                    action: function ( e, dt, node, config ) {
                        window.location.href = '/laporan/data-sidi'
                    }
                },
            ],
        });
    });
</script>
@endsection