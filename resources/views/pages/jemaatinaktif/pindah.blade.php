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
                            <h1>Data Jemaat Pindah</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="table-responsive">
                            @if ($message = Session::get('delete'))
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    </div>
                                </div>
                            @elseif($message = Session::get('success'))
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    </div>
                                </div>
                            @endif
                            <table id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nama Alias</th>
                                        <th>Nomor Stambuk</th>
                                        <th>Lingkungan </th>
                                        <th>Status Jemaat</th>
                                        <th>Tgl Pindah</th>
                                        <th>Ket Pindah</th>
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
                                        <td>
                                            <span style="font-size:10pt" class="label label-primary">{{$datajemaat->riwayatinaktif->jemaat_keterangan_status}}</span>
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($datajemaat->riwayatinaktif->jemaat_tanggal_status)->isoFormat('D MMMM Y') }}</td>
                                        <td>{{ $datajemaat->riwayatinaktif->jemaat_pindah_ke }}</td>
                                        <td style="text-align: center">
                                            <a href={{ route('profiledetail', $datajemaat) }} target="_blank"><button type="button" class="btn btn-primary btn-sm">Lihat Detail</button></a>
                                            @if($datajemaat->jemaat_status_aktif == "t")
                                                <a href={{ route('jemaateditprofile', $datajemaat) }} target="_blank"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
                                            @endif
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
        $('#table').DataTable();
    });
</script>
@endsection