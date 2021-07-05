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
                            <h1>Laporan Rekap Data</h1>
                        </div>
                    </div>
                    <div class="table-responsive" style="width:100%">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="overflow-x: auto;">
                            <table id="laporan" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle" rowspan="2">No. Ling</th>    
                                        <th style="vertical-align:middle" rowspan="2">Nama Ling</th>    
                                        <th class="text-center" colspan="6">Pendidikan</th>    
                                        <th class="text-center" colspan="6">Pekerjaan</th>    
                                    </tr>
                                    <tr>
                                        <th>BS</th>
                                        <th>SD</th>
                                        <th>SMP</th>
                                        <th>SMA</th>
                                        <th>D3</th>
                                        <th>S1</th>
                                        <th>BK</th>
                                        <th>PNS</th>
                                        <th>TNI</th>
                                        <th>POLRI</th>
                                        <th>Wiraswasta</th>
                                        <th>Dll</th>
                                    </tr>    
                                </thead>
                                <tbody>
                                    @foreach ($dataLingkungan as $d)
                                        <tr>
                                            <td>{{$d->nomor_lingkungan}}</td>
                                            <td>{{$d->nama_lingkungan}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][1]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][2]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][3]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][4]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][7]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][9]}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
            "scrollX": true,
            "paging" : false,
            "ordering" : false,
            "searching" : false,
        });
    });
</script>
@endsection