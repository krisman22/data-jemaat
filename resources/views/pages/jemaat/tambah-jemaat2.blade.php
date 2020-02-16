@extends('layouts.app')

@section('content')
    <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <form action="{{route('tambahdatajemaat')}}" method="post" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Data Pribadi</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="row">
                                        @if ($errors->any())                                                       
                                            @foreach ($errors->all() as $error)
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger alert-block" style="margin-bottom:0px">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>{{ $error }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach                                                            
                                        @endif
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Nama" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_nama" value="{{ old('jemaat_nama') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Gelar Depan" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_gelar_depan" value="{{ old('jemaat_gelar_depan') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Gelar Belakang" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_gelar_belakang" value="{{ old('jemaat_gelar_belakang') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Nomor Stambuk" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_nomor_stambuk" value="{{ old('jemaat_nomor_stambuk') }}">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Nama Alias" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group" >
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_nama_alias" value="{{ old('jemaat_nama_alias') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Tempat Tanggal Lahir" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-4" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_tempat_lahir" value="{{ old('jemaat_tempat_lahir') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="padding-left:0">
                                                    <div class="form-group">
                                                        <div class="form-control" style="width:46px;"><i class="fa fa-calendar" style="font-size:26px"></i></div>                                                                    
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-left:0">
                                                    <div class="form-group">
                                                    {{-- <input style="border=0;" type="text" class="form-control" name="jemaat_tanggal_lahir" value="{{$data_jemaat->jemaat_tanggal_lahir}}"> --}}
                                                        <input class="datepicker form-control"  type="text" name="jemaat_tanggal_lahir" value="{{ old('jemaat_tanggal_lahir') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control"  value="Jenis Kelamin" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    
                                                        {{-- <input style="border=0;" type="text" class="form-control" name="jemaat_jenis_kelamin" value="{{$data_jemaat->jemaat_jenis_kelamin}}"> --}}
                                                        <div class="form-group-inner" style="margin: 10px 0">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <div class="i-checks pull-left" style="width:100px; height:40px; padding: 8px 0px;">
                                                                    <input type="radio" value="l" {{ old('jemaat_jenis_kelamin') == 'l' ? 'checked' : '' }} name="jemaat_jenis_kelamin"> <i></i> Laki-Laki
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <div class="i-checks pull-left" style="width:100px; height:40px; padding: 8px 0px;">
                                                                    <input type="radio" value="p" {{ old('jemaat_jenis_kelamin') == 'p' ? 'checked' : '' }} name="jemaat_jenis_kelamin"> <i></i> Perempuan
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Status Perkawinan" readonly="readonly">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        {{-- <input style="border=0;" type="text" class="form-control" name="jemaat_status_perkawinan" value="{{ $data_jemaat->jemaat_status_perkawinan}}"> --}}
                                                        <select class="form-control" name="jemaat_status_perkawinan">
                                                            <option value="1" {{ old('jemaat_status_perkawinan') == 1 ? 'selected' : '' }}>Kawin</option>
                                                            <option value="2" {{ old('jemaat_status_perkawinan') == 2 ? 'selected' : '' }}>Belum Kawin</option>
                                                            <option value="3" {{ old('jemaat_status_perkawinan') == 3 ? 'selected' : '' }}>Duda</option>
                                                            <option value="4" {{ old('jemaat_status_perkawinan') == 4 ? 'selected' : '' }}>Janda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Perkawinan" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        {{-- <input style="border=0;" type="text" class="form-control" name="jemaat_tanggal_perkawinan" value="{{$data_jemaat->jemaat_tanggal_perkawinan}}"> --}}
                                                        <input class="datepicker form-control" type="text" name="jemaat_tanggal_perkawinan" value="{{ old('jemaat_tanggal_perkawinan') }}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Baptis" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input class="datepicker form-control" type="text" name="jemaat_tanggal_baptis" value="{{ old('jemaat_tanggal_baptis') }}" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Sidi" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input class="datepicker form-control" type="text" name="jemaat_tanggal_sidi" value="{{ old('jemaat_tanggal_sidi') }}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Bergabung" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        {{-- <input style="border=0;" type="text" class="form-control" name="jemaat_tanggal_bergabung" value="{{$data_jemaat->jemaat_tanggal_bergabung}}"> --}}
                                                        <input class="datepicker form-control" type="text" name="jemaat_tanggal_bergabung" value="{{ old('jemaat_tanggal_bergabung') }}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4" style="padding-right:0">
                                                        
                                                            <div style="text-align:right; margin:10px 0; vertical-align: middle; padding-top:10px" type="text" class="form-control" value="" readonly="readonly">Nomor Lingkungan </div>
                                                        
                                                    </div>
                                                    <div class="col-md-8" style="padding-left:0">
                                                        <div class="form-group">
                                                            <input style="border=0;" type="text" class="form-control" name="id_lingkungan" value="{{ old('id_lingkungan') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Pendidikan Akhir" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <select class="form-control" name="id_pendidikan_akhir">
                                                            @foreach($data_pendidikans as $data_pendidikan)
                                                                <option value="{{$data_pendidikan->id}}" {{ old('id_pendidikan_akhir') == $data_pendidikan->id ? 'selected' : '' }}>{{$data_pendidikan->nama_pendidikan}}</option>
                                                            @endforeach                                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control"  value="Alamat" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_alamat_rumah" value="{{ old('jemaat_alamat_rumah') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="No Telp" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_nomor_hp" value="{{ old('jemaat_nomor_hp') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Email" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="email" pattern="[^ @]*@[^ @]*" class="form-control" name="jemaat_email" value="{{ old('jemaat_email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Pekerjaan" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        {{-- <input style="border=0;" type="text" class="form-control" name="id_pekerjaan" value="{{ old('id_pekerjaan') }}"> --}}
                                                        <select class="form-control" name="id_pekerjaan">
                                                            @foreach($data_pekerjaans as $data_pekerjaan)
                                                                <option value="{{$data_pekerjaan->id}}" {{ old('id_pekerjaan') == $data_pekerjaan->id ? 'selected' : '' }}>{{$data_pekerjaan->jenis_pekerjaan}}</option>
                                                            @endforeach                                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Golongan Darah" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_golongan_darah" value="{{ old('jemaat_golongan_darah') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="padding-right:0">
                                                    <div class="form-group" style="">
                                                        <input style="text-align:right" type="text" class="form-control" value="Status dikeluarga" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-8" style="padding-left:0">
                                                    <div class="form-group">
                                                        <input style="border=0;" type="text" class="form-control" name="jemaat_status_dikeluarga" value="{{ old('jemaat_status_dikeluarga') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#keluarga">Data Keluarga</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="payment-adress">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah Data</button>
                                    <a href=><button type="button" class="btn btn-primary waves-effect waves-light">Batal</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $('.datepicker').datepicker({

        format: 'yyyy-mm-dd'

    }); 
</script> 

<script type="text/javascript">
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script> 

@endsection