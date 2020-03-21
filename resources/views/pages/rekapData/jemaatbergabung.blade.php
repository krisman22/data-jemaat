@extends('layouts.app')

@section('content')
    <!-- Static Table Start -->
    <div class="static-table-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Rekap Data Jemaat Begabung</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th rowspan="2" width="13%" style="text-align:center; vertical-align:middle">NOMOR LINGKUNGAN</th>
                                        <th rowspan="2" style="vertical-align:middle">NAMA LINGKUNGAN</th>
                                        <th colspan="4" style="text-align:center; vertical-align:middle">JEMAAT BERGABUNG</th>
                                        <th rowspan="2" width="13%" style="vertical-align:middle">JUMLAH SELURUH</th>
                                      </tr>
                                      <tr>
                                          <td width="10%"><{{$year_min2}}</td>
                                          <th widht="10%">{{$year_min2}}</th>
                                          <th widht="10%">{{$year_min1}}</th>
                                          <th widht="10%">{{$thisyear}}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1
                                        @endphp
                                        @foreach ($grouped as $groupNameLingkungan=>$detailNameLingkungan)
                                            <tr data-toggle="collapse" data-target="#data{{$i}}">
                                                <td width="13%" style="border-right:none"></td>
                                                <td style="border-left:none; font-weight:bold">{{$groupNameLingkungan}}</td>
                                                <td width="10%" style="font-weight:bold">{{$bergabung['jumlah-under'.$groupNameLingkungan]}}</td>
                                                <td width="10%" style="font-weight:bold">{{$bergabung[$groupNameLingkungan.'-'.$year_min2]}}</td>
                                                <td width="10%" style="font-weight:bold">{{$bergabung[$groupNameLingkungan.'-'.$year_min1]}}</td>
                                                <td width="10%" style="font-weight:bold">{{$bergabung[$groupNameLingkungan.'-'.$thisyear]}}</td>
                                                <td width="13%" style="font-weight:bold">{{$bergabung['total'.$groupNameLingkungan]}}</td>
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
                                                                    <td width="10%">{{$bergabung[$dataLingkungan->nomor_lingkungan.'under']}}</td>  
                                                                    <td width="10%">{{$bergabung[$dataLingkungan->nomor_lingkungan.$year_min2]}}</td>
                                                                    <td width="10%">{{$bergabung[$dataLingkungan->nomor_lingkungan.$year_min1]}}</td>
                                                                    <td width="10%">{{$bergabung[$dataLingkungan->nomor_lingkungan.$thisyear]}}</td>
                                                                    <td width="13%">{{$bergabung['jumlah'.$dataLingkungan->nomor_lingkungan]}}</td>
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
                                            <td>{{$bergabung['total-under']}}</td>
                                            <td>{{$bergabung['total'.$year_min2]}}</td>
                                            <td>{{$bergabung['total'.$year_min1]}}</td>
                                            <td>{{$bergabung['total'.$thisyear]}}</td>
                                            <td>{{$bergabung['total-akhir']}}</td>
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