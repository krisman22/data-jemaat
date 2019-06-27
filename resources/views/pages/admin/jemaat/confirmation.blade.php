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
                        {{-- <li><a href="#reviews"> Edit Account Information</a></li>
                        <li><a href="#INFORMATION">Edit Social Information</a></li> --}}
                    </ul>
                    {{-- <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="title" value="{{ $myForm->data_jemaat }}">     
                        <textarea style="display:none;" name="body">{{ $myForm->body }}</textarea>     
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>                       --}}
                    @foreach ($datas as $data)
                        <p>{{$data['jemaat_nama']}}</p>
                        <p>{{$data['jemaat_tanggal_lahir']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts')
<script type="text/javascript">

    $('.datepicker').datepicker({

        format: 'yyyy-mm-dd'

    }); 
</script> 

<script type="text/javascript">
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>  --}}

{{-- @endsection --}}