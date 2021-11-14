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
                            <h1>Data Nama telah Sidi</h1>
                        </div>
                    </div>
                    <div class="table-responsive" style="width:100%">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="overflow-x: auto;">
                            <table id="laporan" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle">No. Ling</th>    
                                        <th style="vertical-align:middle">Nama Lingkungan</th>
                                        <th style="vertical-align:middle">Jenis Kelamin</th>    
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Nama Alias</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($data_jemaat as $d)
                                        <tr>
                                            <td>{{$d->lingkungan->nomor_lingkungan}}</td>
                                            <td>{{$d->lingkungan->nama_lingkungan}}</td>
                                            <td>{{$d->jemaat_jenis_kelamin == 'l' ? "L" : "P" }}</td>
                                            <td>{{$d->jemaat_nama}}</td>
                                            <td>{{$d->jemaat_nama_alias}}</td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
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
            dom : 'lBfrtip',
            "scrollX": true,
            "pageLength": 25,
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "{{ route('laporan.namasidi') }}",
                type: 'GET',
            },
            columns: [
                {
                    data: 'id_lingkungan',
                    name: 'id_lingkungan'
                },
                {
                    data: 'lingkungan',
                    name: 'id_lingkungan'
                },
                {
                    data: 'jemaat_jenis_kelamin',
                    name: 'jemaat_jenis_kelamin'
                },
                {
                    data: 'jemaat_nama',
                    name: 'jemaat_nama'
                },
                {
                    data: 'jemaat_nama_alias',
                    name: 'jemaat_nama_alias'
                },
            ],
            order: [
                [1, 'asc']
            ],
            buttons : [
                'copyHtml5',
                'excelHtml5'
            ],
        });
    });
</script>
@endsection