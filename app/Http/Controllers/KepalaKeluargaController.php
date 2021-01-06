<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_jemaat;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KepalaKeluargaExport;


class KepalaKeluargaController extends Controller
{
    public static function index()
    {
        $datajemaats = data_jemaat::where('jemaat_kk_status', '=', true)
                        ->where('jemaat_status_aktif','t')
                        ->get();

        return view('pages.kepalakeluarga.data-kk', compact('datajemaats'));
    }

    public function exportDataKK()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        return Excel::download(new KepalaKeluargaExport, 'Data Kepala Keluarga ' .$now. '.xlsx');
    }
}
