@extends('layouts.app')

@section('content')
    <!-- Static Table Start -->
    <div class="static-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Basic Table</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori Usia</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Balita</td>
                                            <td>{{$kategoriumurs['balita']}}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Kanak - Kanak </td>
                                            <td>{{$kategoriumurs['kanak-kanak']}}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Remaja Awal</td>
                                            <td>{{$kategoriumurs['remaja_awal']}}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Remaja Akhir</td>
                                            <td>{{$kategoriumurs['remaja_akhir']}}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Dewasa Awal</td>
                                            <td>{{$kategoriumurs['dewasa']}}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Dewasa Akhir</td>
                                            <td>{{$kategoriumurs['dewasa_akhir']}}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Lansia Awal</td>
                                            <td>{{$kategoriumurs['lansia_awal']}}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Lansia Akhir</td>
                                            <td>{{$kategoriumurs['lansia_akhir']}}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Manula</td>
                                            <td>{{$kategoriumurs['manula']}}</td>
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
    <!-- Static Table End -->
@endsection