<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_jemaat;

class KepalaKeluargaController extends Controller
{
    public static function index()
    {
        $datajemaats = data_jemaat::where('jemaat_kk_status', '=', true)
                        ->where('jemaat_status_aktif','t')
                        ->get();

        return view('pages.kepalakeluarga.data-kk', compact('datajemaats'));
    }
}
