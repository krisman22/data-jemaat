@extends('layouts.app')

@section('scriptshead')
    <style>
        .head {
            vertical-align: middle !important;
            text-align: center;
        }  
    </style>    

@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="static-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Rekap Data Pendidikan</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="head" rowspan="2" width="13%">NOMOR LINGKUNGAN</th>
                                        <th class="head" rowspan="2" width="19%">NAMA LINGKUNGAN</th>
                                        <th class="head" colspan="11">TINGKAT PENDIDIKAN</th>
                                        <th rowspan="2" width="13%" style="vertical-align:middle">JUMLAH SELURUH</th>
                                      </tr>
                                      <tr>
                                        <th class="head" width="5%" class="head">Belum Sekolah</th>
                                        <th class="head" width="5%" class="head">SD</th>
                                        <th class="head" width="5%" class="head">SMP</th>
                                        <th class="head" width="5%" class="head">SMA</th>
                                        <th class="head" width="5%" class="head">D1</th>
                                        <th class="head" width="5%" class="head">D2</th>
                                        <th class="head" width="5%" class="head">D3</th>
                                        <th class="head" width="5%" class="head">D4</th>
                                        <th class="head" width="5%" class="head">S1</th>
                                        <th class="head" width="5%" class="head">S2</th>
                                        <th class="head" width="5%" class="head">S3</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1
                                        @endphp
                                        @foreach ($grouped as $groupNameLingkungan=>$detailNameLingkungan)
                                            <tr data-toggle="collapse" data-target="#data{{$i}}">
                                                <td style="border-right:none"></td>
                                                <td style="border-left:none; font-weight:bold">{{$groupNameLingkungan}}</td>
                                                @foreach ($pendidikans as $pendidikan)
                                                    <td style="font-weight:bold">{{$pend[$groupNameLingkungan.$pendidikan->id]}}</td>
                                                @endforeach
                                                
                                                <td width="13%" style="font-weight:bold">{{$pend[$groupNameLingkungan.'total']}}</td>
                                            </tr>
                                            <tr class="hiddenRow">
                                                <td colspan="14" style="padding:0;">
                                                    <div class="collapse" id="data{{$i}}"> 
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="13%" style="text-align:center; vertical-align:middle">Nomor Lingkungan </td>
                                                                    <td width="19%" style="vertical-align:middle">Nama Lingkungan</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">Belum Sekolah</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">SD</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">SMP</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">SMA</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">D1</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">D2</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">D3</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">D4</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">S1</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">S2</td>
                                                                    <td width="5%" style="text-align:center; vertical-align:middle">S3</td>
                                                                    <td width="13%" style="text-align:center; vertical-align:middle">JUMLAH SELURUH</td>
                                                                </tr>
                                                                @foreach ($detailNameLingkungan as $dataLingkungan)
                                                                    <tr>
                                                                        <td style="text-align:center">{{$dataLingkungan->nomor_lingkungan}}</td>
                                                                        <td>{{$dataLingkungan->nama_lingkungan}}</td>
                                                                        @foreach ($pendidikans as $pendidikan)
                                                                            <td>{{$pend[$dataLingkungan->nomor_lingkungan.$pendidikan->id]}}</td>
                                                                        @endforeach
                                                                        <td>{{$pend[$dataLingkungan->nomor_lingkungan.'jumlah']}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>    
                                                </td>
                                            </tr>
                                            @php
                                                $i+=1;
                                            @endphp
                                        @endforeach
                                        <tr style="font-weight:bold; font-size:15px">
                                            <td colspan="2" style="text-align:right">Total</td>
                                            @foreach ($pendidikans as $pendidikan)
                                                <td>{{$pend['total'.$pendidikan->id]}}</td>
                                            @endforeach
                                            <td>{{$pend['total']}}</td>
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