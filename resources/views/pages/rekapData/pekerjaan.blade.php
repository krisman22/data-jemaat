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
                                <h1>Rekap Data Pekerjaan</h1>
                            </div>
                            <div class="form-group-inner" style="padding-bottom:2%">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4"></div>
                                    <form action="{{route('getPekerjaan')}}" method="get" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                        {{ csrf_field() }}
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                                            <select id="jemaatfilter" class="form-control" name="id_jemaatfilter" style="padding:0px;">
                                                <option disabled selected></option>
                                                <option {{ old('id_jemaatfilter') == 'f' ? 'selected' : '' }} value="f" >Semua Jemaat</option>
                                                <option {{ old('id_jemaatfilter') == 't' ? 'selected' : '' }} value="t" >Kepala Keluarga</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                                            <select id="pekerjaanid" class="form-control" name="id_pekerjaan" style="padding:0px;">
                                                <option disabled selected></option>
                                                @foreach($data_pekerjaans as $data_pekerjaan)
                                                    <option value="{{$data_pekerjaan->id}}" {{ old('id_pekerjaan') == $data_pekerjaan->id ? 'selected' : '' }} 
                                                        @if ($id_pekerjaan != null)
                                                            @if ($data_pekerjaan->id == $id_pekerjaan)
                                                                value="{{$data_pekerjaan->id}}" selected
                                                                {{-- $nama_pekerjaan = $data_pekerjaan->jenis_pekerjaan; --}}
                                                            @endif
                                                        @endif value2="{{$data_pekerjaan->jenis_pekerjaan}}">{{$data_pekerjaan->jenis_pekerjaan}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <button  class="btn btn-primary btn-md waves-effect waves-light btn-block" style="padding-top:9px; padding-bottom:9px" type="submit">Pilih</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th width="13%" style="text-align:center; vertical-align:middle">NOMOR LINGKUNGAN</th>
                                        <th style="vertical-align:middle">NAMA LINGKUNGAN</th>
                                        <th id="header_pekerjaan" width="20%" style="vertical-align:middle">@if($id_pekerjaan!=null){{$nama_pekerjaan->jenis_pekerjaan}} @else PEKERJAAN @endif</th>
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
                                                <td id="jumlahdata" style="font-weight:bold">{{$data_pekerjaan_perlingkungan[$groupNameLingkungan]}}</td>
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
                                                                        <td width="20%">{{$data_pekerjaan_perlingkungan[$dataLingkungan->nomor_lingkungan]}}</td> 
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
                                            <td>{{$data_pekerjaan_perlingkungan["total"]}}</td>
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

@section('scripts')
<script type="text/javascript">
    $("#pekerjaanid").select2({
          placeholder: "Pilih Pekerjaan"
      });
</script>

<script type="text/javascript">
    $("#jemaatfilter").select2({
          placeholder: "Pilih Data Jemaat"
      });
</script>

@endsection