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
                            <h1>Kartu Keluarga BNKP Jemaat Kota Gunungsitoli</h1>
                        </div>
                    </div>
                    <div class="row mg-b-15">
                        <form action="{{ route('download.all') }}" method="post" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors">
                        {{ csrf_field() }}
                            <div class="col-md-4">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Pilih Lingkungan</label>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                            <select class="form-control" name="lingkungan" style="padding:0px;">
                                                <option disabled selected></option>
                                                @foreach($namaLingkungan as $data => $lingkungan)
                                                    <option value="{{$data}}">{{$data}}</option>
                                                @endforeach                                                                        
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-info btn-sm" type="submit">Download Per Lingkungan</button>
                            </div>
                        </form>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="tableKartuJemaat" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Nama Alias</th>
                                        <th>Nomor Stambuk</th>
                                        <th>Nomor Kartu</th>
                                        <th>No Ling</th>
                                        <th>Lingkungan </th>
                                        <th>Status Jemaat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datajemaats as $datajemaat)
                                        <tr>
                                            <td></td>
                                            <td>{{ $datajemaat->jemaat_nama}}</td>
                                            <td>{{ $datajemaat->jemaat_nama_alias}}</td>                                        
                                            <td>{{ $datajemaat->jemaat_nomor_stambuk}}</td>
                                            <td>{{ $datajemaat->kartukeluarga->nomor_kartu ?? null }}</td>
                                            <td>{{ $datajemaat->lingkungan->nomor_lingkungan }}</td>
                                            <td>{{ $datajemaat->lingkungan->nama_lingkungan}}</td>
                                            <td> @if($jemaat_kk_status=true)Kepala Keluarga @endif</td>
                                            <td style="text-align: center">
                                                <a href={{ route('lihatdatakk', $datajemaat)  }} target="_blank"><button type="button" class="btn btn-primary btn-sm">Lihat Data</button></a>
                                                <a href={{ route('cetakpdf', $datajemaat)  }} target="_blank"><button type="button" class="btn btn-success btn-sm">Cetak Kartu</button></a>
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
        var table = $('#tableKartuJemaat').DataTable( {
            "columnDefs": [
                { "width": "2%", "targets": 0, "ordering" : false },
                { "width": "18%", "targets": 1 },
                { "width": "15%", "targets": 2 },
                { "width": "15%", "targets": 3 },
                { "width": "6%", "targets": 4 },
                { "width": "4%", "targets": 5 },
                { "width": "10%", "targets": 6 },
                { "width": "10%", "targets": 7 },
                { "width": "20%", "targets": 8 },
            ],
            "pageLength" : 25,
            "order": [[ 1, "asc" ]]
        });

        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
</script>
@endsection