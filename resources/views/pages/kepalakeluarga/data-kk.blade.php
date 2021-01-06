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
                            <h1>Data Kepala Keluarga</h1>
                        </div>
                    </div>
                    <div class="row mg-b-15">
                        <div class="col-md-4">
                            <a class="btn btn-success btn-sm" href="{{ route('export.dataKK') }}">Export Data Kepala Keluarga</a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="tableKartuJemaat" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nama Alias</th>
                                        <th>Nomor Stambuk</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor Lingkungan</th>
                                        <th>Nama Lingkungan </th>
                                        <th>Status Jemaat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datajemaats as $datajemaat)
                                        <tr>
                                            <td>{{ $datajemaat->jemaat_nama}}</td>
                                            <td>{{ $datajemaat->jemaat_nama_alias}}</td>                                        
                                            <td>{{ $datajemaat->jemaat_nomor_stambuk}}</td>
                                            <td>{{$datajemaat->pekerjaan->jenis_pekerjaan}}</td>
                                            <td>{{ $datajemaat->lingkungan->nomor_lingkungan}}</td>
                                            <td>{{ $datajemaat->lingkungan->nama_lingkungan}}</td>
                                            <td> @if($jemaat_kk_status=true)Kepala Keluarga @endif</td>
                                            <td style="text-align: center">
                                                <a href={{ route('profiledetail', $datajemaat) }} target="_blank"><button type="button" class="btn btn-primary btn-sm">Lihat Detail</button></a>
                                            </td>
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
        $('#tableKartuJemaat').DataTable( {
            "columnDefs": [
                { "width": "20%", "targets": 0 },
                { "width": "16%", "targets": 1 },
                { "width": "16%", "targets": 2 },
                { "width": "16%", "targets": 3 },
                { "width": "10%", "targets": 4 },
                { "width": "10%", "targets": 5 },
                { "width": "12%", "targets": 6 },
            ]
        });
    });
</script>
@endsection