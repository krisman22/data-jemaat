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
                            <h1>Kartu Keluarga GNKP Indonesia</h1>
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
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-download"></i> Download</button>
                            </div>
                        </form>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="table-responsive">
                            <table id="tableKartuJemaat" class="table table-striped table-bordered table-hover" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Nama Alias</th>
                                        <th>Nomor Stambuk</th>
                                        <th>Nomor Kartu</th>
                                        <th>No Ling</th>
                                        <th>Lingkungan </th>
                                        <th></th>
                                    </tr>
                                </thead>
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
        var table = $('#tableKartuJemaat').DataTable({
            scrollX : true,
            pageLength : 25,
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "{{ route('kartujemaat') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,
                },
                {
                    data: 'jemaat_nama',
                    name: 'jemaat_nama'
                },
                {
                    data: 'jemaat_nama_alias',
                    name: 'jemaat_nama_alias'
                },
                {
                    data: 'jemaat_nomor_stambuk',
                    name: 'jemaat_nomor_stambuk'
                },
                {
                    data: 'nomor_kartu',
                    name: 'kartukeluarga.nomor_kartu',
                },
                {
                    data: 'id_lingkungan',
                    name: 'id_lingkungan'
                },
                {
                    data: 'lingkungan',
                    name: 'lingkungan.nama_lingkungan'
                },
                {
                    data: 'action', name: 'action', orderable: false, searchable: false,
                },

            ],
            order: [
                [1, 'asc']
            ],
        });
    });
</script>
@endsection