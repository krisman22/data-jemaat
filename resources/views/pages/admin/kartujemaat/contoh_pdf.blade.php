<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title></title>
</head>
<body>
        {{-- <table class="table" style="width:100%">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nama Alias</th>
                    <th>Nomor Stambuk</th>
                    <th>Lingkungan </th>
                    <th>Status Jemaat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datajemaats as $datajemaat)
                    <tr>
                        <td>{{ $datajemaat->jemaat_nama}}</td>
                        <td>{{ $datajemaat->jemaat_nama_alias}}</td>                                        
                        <td>{{ $datajemaat->jemaat_nomor_stambuk}}</td>
                        <td>{{ $datajemaat->lingkungan->nomor_lingkungan}} - {{ $datajemaat->lingkungan->nama_lingkungan}}</td>
                        <td> @if($jemaat_kk_status=true)Kepala Keluarga @endif</td>
                        <td style="text-align: center">
                            <a href=# target="_blank"><button type="button" class="btn btn-primary btn-sm">Lihat Data</button></a>
                            <a href=# target="_blank"><button type="button" class="btn btn-primary btn-sm">Cetak Kartu</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
<h5>{{$content}}</h5>

</body>
</body>
</html>