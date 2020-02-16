@extends('layouts.app')

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Kartu Keluarga BNKP Jemaat Kota Gunungsitoli</h1>
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
                                        <th>Lingkungan </th>
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
                                            <td>{{ $datajemaat->lingkungan->nomor_lingkungan}} - {{ $datajemaat->lingkungan->nama_lingkungan}}</td>
                                            <td> @if($jemaat_kk_status=true)Kepala Keluarga @endif</td>
                                            <td style="text-align: center">
                                                <a href={{ route('lihatdatakk', $datajemaat)  }} target="_blank"><button type="button" class="btn btn-primary btn-sm">Lihat Data</button></a>
                                                <a href={{ route('cetakpdf', $datajemaat)  }} target="_blank"><button type="button" class="btn btn-primary btn-sm">Cetak Kartu</button></a>
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
                { "width": "22%", "targets": 0 },
                { "width": "18%", "targets": 1 },
                { "width": "15%", "targets": 2 },
                { "width": "15%", "targets": 3 },
                { "width": "13%", "className": "text-right", "targets": 4 },
                { "width": "17%", "targets": 5 },
            ]
        });
    });
</script>
@endsection