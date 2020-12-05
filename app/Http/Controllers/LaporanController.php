<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_jemaat;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\master_pendidikan;

class LaporanController extends Controller
{
    public function index()
    {
        $dataLingkungan = master_lingkungan::all();
        $pendidikan = [];

        foreach($dataLingkungan as $d){
            $pendidikan[$d->nomor_lingkungan][1] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','1')
                ->count();
                
            $pendidikan[$d->nomor_lingkungan][2] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','2')
                ->count();

            $pendidikan[$d->nomor_lingkungan][3] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','3')
                ->count();

            $pendidikan[$d->nomor_lingkungan][4] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','4')
                ->count();

            $pendidikan[$d->nomor_lingkungan][7] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','7')
                ->count();

            $pendidikan[$d->nomor_lingkungan][9] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','9')
                ->count();
        }

        // dd($pendidikan);

        return view('pages.laporan.laporan', compact('dataLingkungan','pendidikan'));
    }
}
