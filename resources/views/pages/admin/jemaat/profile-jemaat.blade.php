@extends('layouts.app')

@section('content')
    <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Data Pribadi</a></li>
                        <li><a href="#reviews"> Edit Account Information</a></li>
                        <li><a href="#INFORMATION">Edit Social Information</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                <div class="row">
                                                    
                                                <div class="row" style="margin-bottom:10px">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-md-2" style="padding-right:0; padding-left:0;">
                                                            <a href={{ route('jemaateditprofile', $data_jemaat) }}><button type="button" class="btn btn-warning btn-md btn-block">Edit</button></a>
                                                        </div>
                                                        <div class="col-md-4" style="padding-right:0; padding-left:0;">
                                                            <button type="button" class="btn btn-info btn-md btn-block">Ubah Status Jemaat</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Nama" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_nama}}">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_nama_alias}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Tempat Tanggal Lahir" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_tempat_lahir}}, {{$data_jemaat->jemaat_tanggal_lahir->format('d F Y')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Umur" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->getAge()}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Jenis Kelamin" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="@if($data_jemaat->jemaat_jenis_kelamin == "l") Laki-laki @else Perempuan @endif ">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="{{ $data_jemaat->jemaat_status_perkawinan}}">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->id}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Lingkungan" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->id_lingkungan}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Alamat" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_alamat_rumah}}">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_nomor_hp}}">
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
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Status Dikeluarga" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->jemaat_status_dikeluarga}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="Lingkungan" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="{{$data_jemaat->id_lingkungan}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-right:0">
                                                                <div class="form-group" style="">
                                                                    <input style="text-align:right" type="text" class="form-control" value="" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" style="padding-left:0">
                                                                <div class="form-group">
                                                                    <input style="border=0;" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Email" value="Admin@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="Phone" value="01962067309">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Password" value="#123#123">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" value="#123#123">
                                                    </div>
                                                    <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
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