<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}>

    <style>
        h1{
            display: inline-block;
            font-size: 21px;
            font-weight:800;
            letter-spacing : -1px;
            transform: scale(1.13, 2.8);
        }
        .logo{
            width: 125px;
            height: 125px;
            margin: 10px 0 10px 45px;
        }

        .table {
            font-size: 12px;
        }
        .table tbody tr td {
            padding : 2px;
            vertical-align: middle;            
        }
        #head{
            font-weight: bold;
            text-align: center;
        }
        #bluehead{
            background-color: cyan;
        }
        #bluehead td{
            text-align: center;
            font-style: italic;
            font-size: 11px;
        }
        tr .noBorder td {
            border: 0;
        }
       .table td[rowspan] {
            vertical-align: middle;
       }
       .table td[colspan] {
            vertical-align: middle;
       }
       .table tr td {
            vertical-align: middle;
       }
    </style>
</head>

<body style="text-transform: uppercase;">
<!-- Static Table Start -->
<div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
            <img  src="{{ asset('img/logo-bnkp.jpg')}}" class="logo" alt="">
        </div>
        <div class="col-md-6" style="text-align:center">
            <h1>KARTU KELUARGA BNKP JEMAAT KOTA GUNUNGSITOLI</h1> <br>
            <h2 style="font-size: 18pt; font-weight:bold; text-align:center">NOMOR : </h2>
        </div>
    </div>
  
    <table class="table table-bordered">
        <tbody>
            {{-- <tr>
                <td> </td>
                <td rowspan="2"> </td>
                <td colspan="5"><h1 style="font-size: 20pt; margin : 0; text-align:center">KARTU KELUARGA BNKP JEMAAT KOTA GUNUNGSITOLI</h1></td>
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> </td>                                       
                <td colspan="5"><h1 style="font-size: 16pt; text-align:center">NOMOR : </h1></td>
                <td colspan="3" > </td>
            </tr> --}}
            <div class=row>
                <div class="col-md-3" style="height:20px; width: 275px; margin-left:42px;">
                    <h5>NAMA KEPALA KELUARGA </h5> <br>
                </div>
                <div class="col-md-5" style="height:20px; padding-left:1px;">
                    <h5>: {{$data_jemaat->jemaat_nama}} </h5> <br>
                </div>
                <div class="col-md-4" style="height:20px; width: 300px; margin-left:57px;">
                    <h5>LINGKUNGAN NOMOR : {{$data_jemaat->id_lingkungan}} {{$data_jemaat->lingkungan->nama_lingkungan}}</h5> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" style="height:45px; width: 275px; margin-left:42px;">
                    <h5>ALAMAT LENGKAP/DESA/LURAH</h5> <br>
                </div>
                <div class="col-md-3" style="height:45px; width: 275px;  padding-left:1px;">
                    <h5>: {{$data_jemaat->jemaat_alamat_rumah}}</h5> <br>
                </div>
            </div>
            
            <tr id="head">
                <td  rowspan="2" width="3%">NO URUT </td>
                <td  width="20%">A. NAMA LENGKAP</td>
                <td  rowspan="2" width="10%">STATUS HUBUNGAN DENGAN KEPALA KELUARGA</td>
                <td  rowspan="2" width="8%">JENIS KELAMIN L/P </td>
                <td  colspan="2" width="23%"> LAHIR</td>
                <td colspan="2" width="23%">TGL/BLN/THN </td>
                <td  rowspan="2" width="9%"> STATUS PERKAWINAN</td>
                <td  rowspan="2" width="19%"> TANGGAL PERKAWINAN</td>
            </tr>
            <tr id="head">
                <td >B. NAMA PANGGILAN ALIAS </td>
                <td  width="10%">TEMPAT </td>
                <td  width="10%">TGL/BLN/THN</td>
                <td  width="10%">BAPTIS</td>
                <td  width="10%">SIDI</td>
            </tr>
            <tr id="bluehead">
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>

            <?php $i=1 ?>
            @foreach ($dataKartuKeluargas as $dataKartuKeluarga)
            <tr>
                <td style="text-align:center;" @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>{{$i}}</td>
                <td>
                    @if($dataKartuKeluarga->jemaat_gelar_depan !="" && $dataKartuKeluarga->jemaat_gelar_belakang !=""){{$dataKartuKeluarga->jemaat_gelar_depan}}.{{$dataKartuKeluarga->jemaat_nama}},{{$dataKartuKeluarga->jemaat_gelar_belakang}} @elseif($dataKartuKeluarga->jemaat_gelar_depan !=""){{$dataKartuKeluarga->jemaat_gelar_depan}}.{{$dataKartuKeluarga->jemaat_nama}},@elseif($dataKartuKeluarga->jemaat_gelar_belakang !=""){{$dataKartuKeluarga->jemaat_nama}},{{$dataKartuKeluarga->jemaat_gelar_belakang}}@else{{$dataKartuKeluarga->jemaat_nama}}
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_status_dikeluarga == 1 || $dataKartuKeluarga->jemaat_status_dikeluarga == 0 && $dataKartuKeluarga->jemaat_kk_status==true) KEPALA KELUARGA
                        @elseif ($dataKartuKeluarga->jemaat_status_dikeluarga == 2) ISTRI
                        @elseif ($dataKartuKeluarga->jemaat_status_dikeluarga == 3) ANAK
                        @elseif ($dataKartuKeluarga->jemaat_status_dikeluarga == 4) FAMILI
                        @elseif ($dataKartuKeluarga->jemaat_status_dikeluarga == 5) ADIK KANDUNG
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>@if($dataKartuKeluarga->jemaat_jenis_kelamin == "l") LAKI-LAKI
                    @else PEREMPUAN
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>{{$dataKartuKeluarga->jemaat_tempat_lahir}}</td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_tanggal_lahir != null){{$dataKartuKeluarga->jemaat_tanggal_lahir->formatLocalized('%d %B %Y')}}
                    @else -
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_tanggal_baptis != null){{$dataKartuKeluarga->jemaat_tanggal_baptis->formatLocalized('%d %B %Y')}}
                    @else -
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_tanggal_sidi != null){{$dataKartuKeluarga->jemaat_tanggal_sidi->formatLocalized('%d %B %Y')}}
                    @else -
                    @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_status_perkawinan==1) KAWIN @elseif($dataKartuKeluarga->jemaat_status_perkawinan==2) BELUM KAWIN @elseif($dataKartuKeluarga->jemaat_status_perkawinan==3) DUDA @elseif($dataKartuKeluarga->jemaat_status_perkawinan==4) JANDA @endif
                </td>
                <td @if($dataKartuKeluarga->jemaat_nama_alias != null) rowspan="2" @endif>
                    @if($dataKartuKeluarga->jemaat_tanggal_perkawinan != null) {{$dataKartuKeluarga->jemaat_tanggal_perkawinan->formatLocalized('%d %B %Y')}}
                    @else -
                    @endif
                </td>
            </tr>
            @if($dataKartuKeluarga->jemaat_nama_alias != null)
            <tr>
                <td>{{$dataKartuKeluarga->jemaat_nama_alias}}</td>
            </tr>
            @endif
            <?php $i++ ?>
            @endforeach
            @if($i < 10)
                @for($j=$i; $j <= 10; $j++)
                    <tr>
                        <td style="text-align:center;">{{$j}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            @else
            @endif
            <tr >
                <td style="height:15px;"></td> 
            </tr>
            <tr id="head">
                <td rowspan="2">NO URUT </td>
                <td rowspan="2">PEKERJAAN</td>
                <td rowspan="2">PENDIDIKAN TERAKHIR</td>
                <td colspan="4">NAMA</td>
                <td rowspan="2">STAMBUK NOMOR</td>
                <td rowspan="2">TGL/BLN/THN MENINGGAL</td>
                <td rowspan="2">KETERANGAN</td>
            </tr>
            <tr id="head">
                <td colspan="2">AYAH</td>
                <td colspan="2">IBU</td>
            </tr>
            <tr id="bluehead">
                <td></td>
                <td>10</td>
                <td>11</td>
                <td colspan="2">12</td>
                <td colspan="2">13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
            </tr>
            <?php $i=1 ?>
            @foreach ($dataKartuKeluargas as $dataKartuKeluarga)
                <tr>
                    <td style="text-align:center">{{$i}}</td>
                    <td>{{$dataKartuKeluarga->pekerjaan->jenis_pekerjaan}}</td>
                    <td>
                        @if($dataKartuKeluarga->id_pendidikan_akhir != null){{$dataKartuKeluarga->pendidikan->nama_pendidikan}}
                        @else -
                        @endif
                    </td>
                    @foreach ($data_keluargas as $data_keluarga)
                        @if($data_keluarga->no_stambuk == $dataKartuKeluarga->jemaat_nomor_stambuk)
                            <td colspan="2"> {{$data_keluarga->nama_ayah}} </td>
                            <td colspan="2"> {{$data_keluarga->nama_ibu}} </td>
                        @endif
                    @endforeach
                    <td>{{$dataKartuKeluarga->jemaat_nomor_stambuk}}</td>
                    <td>
                        @if($dataKartuKeluarga->jemaat_tanggal_status != null){{$$dataKartuKeluarga->jemaat_tanggal_status->formatLocalized('%d %B %Y')}}
                        @else -
                        @endif
                    </td>
                    <td>-</td>
                </tr>
            <?php $i++ ?>
            @endforeach
            @if($i < 10)
                @for($j=$i; $j <= 10; $j++)
                    <tr id="tablecontent">
                        <td style="text-align:center;">{{$j}}</td>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            @else
            @endif
        </tbody>
    </table>
                        
</div>
</body>

</html>