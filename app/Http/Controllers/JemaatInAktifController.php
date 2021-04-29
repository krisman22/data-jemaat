<?php

namespace App\Http\Controllers;

use App\data_jemaat;
use App\master_pendidikan;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JemaatInAktifController extends Controller
{
    //
    public static function meninggal()
    {
        $datajemaats = data_jemaat::with('riwayatinaktif')
            ->whereHas('riwayatinaktif', function ($query) {
                $query->where('jemaat_keterangan_status', 'meninggal');
            })
            ->where('jemaat_status_aktif','f')->get();
        
        return view('pages.jemaatinaktif.meninggal', compact('datajemaats'));
    }
    
    public static function pindah()
    {
        $datajemaats = data_jemaat::with('riwayatinaktif')
            ->whereHas('riwayatinaktif', function ($query) {
                $query->where('jemaat_keterangan_status', 'pindah');
            })
            ->where('jemaat_status_aktif','f')->get();

        return view('pages.jemaatinaktif.pindah', compact('datajemaats'));
    }
    
}
