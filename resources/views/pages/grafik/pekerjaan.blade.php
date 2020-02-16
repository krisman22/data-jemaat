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
                                <h1>Grafik Data Pekerjaan</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
@endsection

{{-- @section('scripts')
<script type="text/javascript">
    $("#pekerjaanid").select2({
          placeholder: "Pilih Pekerjaan"
      });
</script>

<script type="text/javascript">
    $(document).ready(function () {
    $("#pekerjaanid").change(function () {
        var val = $(this).val();
        var val2 = $(this).find('option:selected').attr('value2');
        if (val == val) {
            $("#header_pekerjaan").html("<th>"+val2+"</th>");
        }
    });
});
</script>

@endsection --}}