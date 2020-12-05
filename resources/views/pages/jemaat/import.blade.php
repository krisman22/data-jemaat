@extends('layouts.app')

@section('content')
    <!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <form action="{{route('import.datajemaat')}}" method="post" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        {{ csrf_field() }}
                        <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-block" style="margin-bottom:0px;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom:4vh;margin-top:2vh">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Import Data</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit" style="padding-top:15px">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Nama</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            <input type="file" name="file" class="form-control">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group-inner">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-offset-5 col-md-offset-5 col-sm-offset-5" >
                                                <button class="btn btn-primary waves-effect waves-light btn-block" type="submit">Simpan</button>
                                            </div>
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
@endsection

@section('scripts')
<script type="text/javascript">

    $('.datepicker').datepicker({

        format: 'dd/mm/yyyy'

    }); 
</script> 

<script type="text/javascript">
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>

<script type="text/javascript">

    $("#nameid").select2({
          placeholder: "Pilih KK"
      });
</script>

<script>
   $(document).ready(function() {
    // $('#isKK').hide();
     $('#isKK').click(function() {
       if ($(this).prop("checked") == true) {
         $('#pilihKK').hide();
       } else {
        $('#pilihKK').show();         
       }
     })
   });
</script>


@endsection