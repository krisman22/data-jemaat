@section('scriptshead')
<script type="text/javascript">
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTabedu1 a[href="' + activeTab + '"]').tab('show');
            window.localStorage.removeItem("activeTab");
        }
    });
    </script>
@endsection
@extends('layouts.app', ['title' => 'Profile'])

@section('content')
    <!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a data-toggle="tab" href="#description">Data Pribadi</a></li>
                        <li><a data-toggle="tab" href="#keluarga"> Data Keluarga</a></li>
                        <li><a data-toggle="tab" href="#komisi">Data Komisi</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            {{-- <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"> --}}
                                                <div class="row" style="border : 1px solid grey;">
                                                    <!--Detail Top -->
                                                    <div class="col-md-12" style="border-bottom : 1px solid grey; margin-bottom: 20px; margin-top: 20px;">
                                                        <div class="col-md-6 col-md-offset-3">
                                                            <div class="row">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Nama" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" 
                                                                        value="@if($data_jemaat->jemaat_gelar_depan == "")@else{{$data_jemaat->jemaat_gelar_depan}}. @endif{{$data_jemaat->jemaat_nama}}@if($data_jemaat->jemaat_gelar_belakang == "")@else, {{$data_jemaat->jemaat_gelar_belakang}}. @endif" readonly="readonly" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Nomor Stambuk" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_nomor_stambuk}}" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Nama Alias" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group" >
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_nama_alias}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End of Detail Top -->

                                                    <!--Button Navigation -->
                                                    @if($data_jemaat->jemaat_status_aktif == "t")
                                                    <div class="col-md-12">
                                                        @if ($message = Session::get('update'))
                                                            <div class="col-md-12">
                                                                <div class="alert alert-info alert-block">
                                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2 col-md-offset-2">
                                                                    <a href="#" data-toggle="modal" data-target="#jadikankkmodal"> <button type="button" class="btn btn-info btn-block">Jadikan KK</button></a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href={{ route('jemaateditprofile', $data_jemaat) }}> <button type="button" class="btn btn-warning btn-block">Edit</button></a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ubah Status Jemaat
                                                                            <span class="caret"></span></button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#" data-toggle="modal" data-target="#PrimaryModalalert">Pindah</a></li>
                                                                            <li><a href="#" data-toggle="modal" data-target="#DangerModalalert">Meninggal</a></li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <a href="#" data-toggle="modal" data-target="#DangerModalalert1">
                                                                        <button type="button" class="btn btn-danger btn-block">Hapus </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                                            <div id="DangerModalalert1" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('hapusdatajemaat', $data_jemaat)}}" method="POST"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('PATCH') }}
                                                                        <div class="modal-close-area modal-close-df">
                                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Hapus Data : </p><h4>{{$data_jemaat->jemaat_nama}}</h4>
                                                                        </div>
                                                                        <div class="modal-footer danger-md">
                                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="jadikankkmodal" class="modal modal-edu-general FullColor-popup-InfoModal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('jadikankk', $data_jemaat)}}" method="POST"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('PATCH') }}
                                                                            <div class="modal-close-area modal-close-df">
                                                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Jadikan Kepala Keluarga : </p><h4>{{$data_jemaat->jemaat_nama}}</h4>
                                                                            </div>
                                                                            <div class="modal-footer info-md">
                                                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Wrapper Modals -->
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"> 
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('updatestatuspindah', $data_jemaat)}}" method="POST"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('PATCH') }}
                                                                            <div class="modal-close-area modal-close-df">
                                                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                            </div>
                                                                            <div class="modal-body">                                                                            
                                                                                <h4>Update Status Jemaat - <span style="text-transform: uppercase">{{$data_jemaat->jemaat_nama}}</span> (Pindah)</h4>
                                                                                <div class="row">
                                                                                    <div class="col-md-4" style="padding-right:0">
                                                                                        <div class="form-group">
                                                                                            <input style="text-align:right" type="text" class="form-control" value="Tanggal" readonly="readonly">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-8" style="padding-left:0">
                                                                                        <div class="form-group">
                                                                                            <input class="datepicker form-control" type="text" name="jemaat_tanggal_status" value="@if($data_jemaat->jemaat_tanggal_status != null) {{$data_jemaat->jemaat_tanggal_status->format('Y-m-d')}} @endif" placeholder="yyyy-mm-dd" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                {{-- <a data-dismiss="modal" href="#">Batal</a> --}}
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div id="DangerModalalert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('updatestatusmeninggal', $data_jemaat)}}" method="POST"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('PATCH') }}
                                                                        <div class="modal-close-area modal-close-df">
                                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4>Update Status Jemaat - <span style="text-transform: uppercase">{{$data_jemaat->jemaat_nama}}</span> (Meninggal)</h4>
                                                                            <div class="row">
                                                                                <div class="col-md-4" style="padding-right:0">
                                                                                    <input style="text-align:right" type="text" class="form-control" value="Tanggal" readonly="readonly">
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-left:0">
                                                                                    <input class="datepicker form-control" type="text" name="jemaat_tanggal_status" value="@if($data_jemaat->jemaat_tanggal_status != null) {{$data_jemaat->jemaat_tanggal_status->format('Y-m-d')}} @endif" placeholder="yyyy-mm-dd">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer danger-md">
                                                                            {{-- <a data-dismiss="modal" href="#">Batal</a> --}}
                                                                            {{-- <a href="#">Simpan</a> --}}
                                                                            <button type="submit" class="btn btn-danger">Simpan</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--End off wrapper Modals -->
                                                    </div>
                                                    @endif
                                                    <!-- End of Button Navigation -->

                                                    <!--Detai Jemaat -->
                                                    <div class="col-md-12" style="margin-top:20px">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Tempat Tanggal Lahir" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                    <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_tempat_lahir}}, {{$data_jemaat->jemaat_tanggal_lahir->formatLocalized('%d %B %Y')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Umur" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                    <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->getAge()}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Jenis Kelamin" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_jenis_kelamin == "l") Laki-laki @else Perempuan @endif ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Status Perkawinan" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0;  background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_status_perkawinan==1) Kawin @elseif($data_jemaat->jemaat_status_perkawinan==2) Belum Kawin @elseif($data_jemaat->jemaat_status_perkawinan==3) Duda @elseif($data_jemaat->jemaat_status_perkawinan==4) Janda @endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Perkawinan" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                            <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_tanggal_perkawinan != null){{$data_jemaat->jemaat_tanggal_perkawinan->formatLocalized('%d %B %Y')}}@endif" placeholder="-">

                                                                        {{-- <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_tanggal_perkawinan != null){{$data_jemaat->jemaat_tanggal_perkawinan->formatLocalized('%d %B %Y')}}@else - @endif"> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Baptis" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0;  background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_tanggal_baptis != null){{$data_jemaat->jemaat_tanggal_baptis->formatLocalized('%d %B %Y')}} @else - @endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Sidi" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_tanggal_sidi != null){{$data_jemaat->jemaat_tanggal_sidi->formatLocalized('%d %B %Y')}} @else - @endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Tanggal Bergabung" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0;  background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_tanggal_bergabung != null){{$data_jemaat->jemaat_tanggal_bergabung->formatLocalized('%d %B %Y')}} @else - @endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Pendidikan Akhir" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->pendidikan->nama_pendidikan}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Lingkungan" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->id_lingkungan}} - {{$data_jemaat->lingkungan->nama_lingkungan}} ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Alamat" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_alamat_rumah}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="No Telp" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_nomor_hp}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Email" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_email}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Pekerjaan" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->pekerjaan->jenis_pekerjaan}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Status dengan KK" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="@if($data_jemaat->jemaat_status_dikeluarga == 1) Kepala Keluarga
                                                                            @elseif ($data_jemaat->jemaat_status_dikeluarga == 2) Istri
                                                                            @elseif ($data_jemaat->jemaat_status_dikeluarga == 3) Anak
                                                                            @elseif ($data_jemaat->jemaat_status_dikeluarga == 4) Famili
                                                                            @elseif ($data_jemaat->jemaat_status_dikeluarga == 5) Adik Kandung
                                                                            @endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-4" style="padding-right:0">
                                                                    <div class="form-group" style="">
                                                                        <input style="text-align:right" type="text" class="form-control" value="Golongan Darah" readonly="readonly">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" style="padding-left:0">
                                                                    <div class="form-group">
                                                                        <input style="border=0; background-color:white" readonly="readonly" type="text" class="form-control" value="{{$data_jemaat->jemaat_golongan_darah}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End Of Detail Jemaat -->
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="keluarga">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="product-status-wrap">
                                        <h4>Daftar Nama Keluarga</h4>
                                        <div class="add-product">
                                            <a href="#">Tambah Daftar Keluarga</a>
                                        </div>
                                        <div class="asset-inner">
                                            <table>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Status Keluarga</th>
                                                </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            @if($dataAyahnon != null) {{$dataAyahnon}}
                                                            @else -
                                                            @endif
                                                        </td>
                                                        <td>Ayah Kandung</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            @if($dataIbunon != null){{$dataIbunon}}
                                                            @else - 
                                                            @endif</td>
                                                        <td>Ibu Kandung</td>
                                                    </tr>
                                                    @php
                                                        $i=3;
                                                    @endphp
                                                    @if($suami != null || $istri != null)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>@if($suami != null) {{$suami->jemaat_nama}} @else {{$istri->jemaat_nama}} @endif</td>
                                                        <td>@if($suami != null) Suami @else Istri @endif</td>
                                                    </tr>
                                                    @endif
                                                    @if($anaks!=null)
                                                        @foreach ($anaks as $anak)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>@if($anak != null){{$anak->jemaat_nama}} @else - @endif</td>
                                                                <td>Anak</td>
                                                                @php
                                                                    $i+=1;
                                                                @endphp
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    @if($saudaras!=null)
                                                        @foreach ($saudaras as $saudara)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>@if($saudara != null){{$saudara->jemaat_nama}} @else - @endif</td>
                                                                <td>Saudara Kandung</td>
                                                                @php
                                                                    $i+=1;
                                                                @endphp
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    @if($adiks != null)
                                                        @foreach ($adiks as $adik)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>@if($adik != null){{$adik->jemaat_nama}} @else - @endif</td>
                                                                <td>Adik Kandung</td>
                                                                @php
                                                                    $i+=1;
                                                                @endphp
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="komisi">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Facebook URL" value="http://www.facebook.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Twitter URL" value="http://www.twitter.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Google Plus" value="http://www.google-plus.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Linkedin URL" value="http://www.Linkedin.com">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection