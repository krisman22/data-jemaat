<?php

namespace App\Http\Controllers;

use App\data_jemaat;
use App\master_pendidikan;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\DataKeluarga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $thisyear = Carbon::now()->year;
        $year_min1 = $thisyear - 1;
        $year_min2 = $thisyear - 2;
        $years = ["<2018",$year_min2,$year_min1,$thisyear];
        
        $laki = []; 

        $laki[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) < '$year_min2'"));

        $laki[1] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$year_min2'"));

        $laki[2] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$year_min1'"));

        $laki[3] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$thisyear'"));

        $perempuan = [];

        $perempuan[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) < '$year_min2'"));

        $perempuan[1] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$year_min2'"));

        $perempuan[2] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$year_min1'"));

        $perempuan[3] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS INT) = '$thisyear'"));

        // dd($perempuan);

        return view('pages.index', compact('years','laki','perempuan'));
    }
}
