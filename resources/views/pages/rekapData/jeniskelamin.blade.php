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
                                <h1>Rekap Data Jenis Kelamin</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th rowspan="2" width="13%" style="text-align:center; vertical-align:middle">NOMOR LINGKUNGAN</th>
                                        <th rowspan="2" style="vertical-align:middle">NAMA LINGKUNGAN</th>
                                        <th colspan="2" style="text-align:center; vertical-align:middle">JENIS KELAMIN</th>
                                        <th rowspan="2" width="13%" style="vertical-align:middle">JUMLAH JEMAAT</th>
                                      </tr>
                                      <tr>
                                          <th width="13%" style="text-align:center; vertical-align:middle">Laki-laki</th>
                                          <th width="13%" style="text-align:center; vertical-align:middle">Perempuan</th>
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
                                                <td style="font-weight:bold">{{$dataJK[$groupNameLingkungan.'l']}}</td>
                                                <td style="font-weight:bold">{{$dataJK[$groupNameLingkungan.'p']}}</td>
                                                <td style="font-weight:bold">{{$dataJK[$groupNameLingkungan.'t']}}</td>
                                            </tr>
                                            <tr class="hiddenRow">
                                                <td colspan="12" style="padding:0;">
                                                    <div class="collapse" id="data{{$i}}"> 
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                @foreach ($detailNameLingkungan as $dataLingkungan)
                                                                    <tr>
                                                                    <td width="13%" style="text-align:center">{{$dataLingkungan->nomor_lingkungan}}</td>
                                                                    <td>{{$dataLingkungan->nama_lingkungan}}</td>
                                                                    <td width="13%">{{$dataJK[$dataLingkungan->nomor_lingkungan.$dataLingkungan->nama_lingkungan.'l']}}</td>
                                                                    <td width="13%">{{$dataJK[$dataLingkungan->nomor_lingkungan.$dataLingkungan->nama_lingkungan.'p']}}</td>
                                                                    <td width="13%">{{$dataJK[$dataLingkungan->nomor_lingkungan.$dataLingkungan->nama_lingkungan.'t']}}</td>
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
                                            <td>{{$dataJK['totalL']}}</td>
                                            <td>{{$dataJK['totalP']}}</td>
                                            <td>{{$dataJK['totalT']}}</td>
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