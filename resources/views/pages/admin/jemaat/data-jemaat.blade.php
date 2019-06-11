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
                                    <tr>
                                        <td>Adven Setiawan Gulo</td>
                                        <td>19971221</td>
                                        <td>101 - Mudik</td>
                                        <td>Gunungsitoli, 21 Des 1997</td>
                                        <td>Aktif</td>
                                        <td><button type="button" class="btn btn-success btn-sm">Lihat Detail</button></td>
                                    </tr>
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