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
                            <h1>Data Statistik Jemaat</h1>
                        </div>
                    </div>
                    <div class="table-responsive" style="width:100%">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="overflow-x: auto;">
                            <table id="laporan" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle" rowspan="3">No. Ling</th>    
                                        <th style="vertical-align:middle" rowspan="3">Nama Lingkungan</th>
                                        <th style="vertical-align:middle" rowspan="3">Jumlah KK </th>    
                                        <th style="vertical-align:middle" rowspan="3">Jumlah Jiwa</th>
                                        <th class="text-center" colspan="6">Jumlah Jiwa</th>
                                        <th class="text-center" colspan="11">Pendidikan</th>    
                                        <th class="text-center" colspan="10">Pekerjaan</th>    
                                    </tr>
                                    <tr>
                                        <th style="vertical-align:middle" colspan="2">Dewasa</th>
                                        <th style="vertical-align:middle" rowspan="2">Jumlah</th>
                                        <th style="vertical-align:middle" colspan="2">Anak-anak</th>
                                        <th style="vertical-align:middle" rowspan="2">Jumlah</th>
                                        <th style="vertical-align:middle" rowspan="2">SD</th>
                                        <th style="vertical-align:middle" rowspan="2">SMP</th>
                                        <th style="vertical-align:middle" rowspan="2">SMA</th>
                                        <th style="vertical-align:middle" rowspan="2">D1</th>
                                        <th style="vertical-align:middle" rowspan="2">D2</th>
                                        <th style="vertical-align:middle" rowspan="2">D3</th>
                                        <th style="vertical-align:middle" rowspan="2">D4</th>
                                        <th style="vertical-align:middle" rowspan="2">S1</th>
                                        <th style="vertical-align:middle" rowspan="2">S2</th>
                                        <th style="vertical-align:middle" rowspan="2">S3</th>
                                        <th style="vertical-align:middle" rowspan="2">DLL</th>
                                        <th style="vertical-align:middle" rowspan="2">PNS</th>
                                        <th style="vertical-align:middle" rowspan="2">TNI/Polri</th>
                                        <th style="vertical-align:middle" rowspan="2">Wiraswasta</th>
                                        <th style="vertical-align:middle" rowspan="2">Petani</th>
                                        <th style="vertical-align:middle" rowspan="2">Peternak</th>
                                        <th style="vertical-align:middle" rowspan="2">Pedagang</th>
                                        <th style="vertical-align:middle" rowspan="2">Tukang</th>
                                        <th style="vertical-align:middle" rowspan="2">Nelayan</th>
                                        <th style="vertical-align:middle" rowspan="2">Karywan Swasta</th>
                                        <th style="vertical-align:middle" rowspan="2">Dll</th>
                                    </tr> 
                                    <tr>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>L</th>
                                        <th>P</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                    @foreach ($lingkungan as $d)
                                        <tr>
                                            <td>{{$d->nomor_lingkungan}}</td>
                                            <td>{{$d->nama_lingkungan}}</td>
                                            <td>{{$jumlahKK[$d->nomor_lingkungan]['jumlahKK']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['jumlahJiwa']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['l']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['p']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['dewasa']['l'] + $jumlahJiwa[$d->nomor_lingkungan]['dewasa']['p'] }}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['anak']['l']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['anak']['p']}}</td>
                                            <td>{{$jumlahJiwa[$d->nomor_lingkungan]['anak']['l'] + $jumlahJiwa[$d->nomor_lingkungan]['anak']['p']}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][2]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][3]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][4]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][5]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][6]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][7]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][8]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][9]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][10]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan][11]}}</td>
                                            <td>{{$pendidikan[$d->nomor_lingkungan]["dll"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["pns"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["tnipolri"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["wiraswasta"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["petani"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["peternak"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["pedagang"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["tukang"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["nelayan"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["karyawanswasta"]}}</td>
                                            <td>{{$pekerjaan[$d->nomor_lingkungan]["dll"]}}</td>
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
            dom : 'Bfrtip',
            "scrollX": true,
            "paging" : false,
            "ordering" : false,
            "searching" : true,
            buttons : [
                'copyHtml5',
                'excelHtml5'
            ]
        });
    });
</script>
@endsection