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
                            <h1>Data Jemaat</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            {{-- <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div> --}}
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="nomorstambuk">Nomor Stambuk</th>
                                        <th data-field="lingkungan">Lingkungan </th>
                                        <th data-field="ttl">TTL</th>
                                        {{-- <th data-field="complete">Completed</th> --}}
                                        <th data-field="status">Status Jemaat</th>
                                        {{-- <th data-field="date" data-editable="true">Date</th>
                                        <th data-field="price" data-editable="true">Price</th> --}}
                                        <th data-field="action"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datajemaats as $datajemaat)
                                    <tr>
                                        <td>{{ $datajemaat->jemaat_nama}}</td>
                                        <td>{{ $datajemaat->jemaat_nostambuk}}</td>
                                        <td>{{ $datajemaat->id_lingkungan}}</td>
                                        <td>{{ $datajemaat->jemaat_tempat_lahir}}, {{ $datajemaat->jemaat_tanggal_lahir->format('d M Y') }}</td>
                                        <td>@if($datajemaat->jemaat_status_aktif == "t")
                                            Aktif
                                            @else
                                                {{$datajemaat->jemaat_keterangan_status}} ({{$datajemaat->jemaat_tanggal_meninggal->format('d M Y') }})
                                            @endif
                                        </td>
                                        <td>
                                            <a href={{ route('profiledetail', $datajemaat) }}><button type="button" class="btn btn-info btn-sm">Lihat Detail</button></a>
                                            <a href={{ route('jemaatedit', $datajemaat) }}><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
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