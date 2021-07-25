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
        // $year_min3 = $thisyear - 3;
        $years = [$year_min2,$year_min1,$thisyear];
        
        $laki = []; 

        // $laki[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min3'"));

        $laki[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min2'"));

        $laki[1] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min1'"));

        $laki[2] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'l' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$thisyear'"));

        $perempuan = [];

        // $perempuan[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min3'"));

        $perempuan[0] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min2'"));

        $perempuan[1] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$year_min1'"));

        $perempuan[2] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, jemaat_jenis_kelamin FROM data_jemaats where jemaat_status_aktif = 't' AND jemaat_jenis_kelamin = 'p' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$thisyear'"));

        $data = [];

        //count Total jemaat
        $data['total_jemaat'] = data_jemaat::where('jemaat_status_aktif','t')->count();
        //count Total kepala keluarga
        $data['total_kk'] = data_jemaat::where('jemaat_kk_status', '=', true)->where('jemaat_status_aktif', 't')->count();
        //count Total lingkungan                
        $data['total_lingkungan'] = master_lingkungan::count();
        //count Total jemaat yang bergabung di tahun ini
        $data['total_bergabung_thisyear'] = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif FROM data_jemaats where jemaat_status_aktif = 't' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) = '$thisyear'"));
        //count Total seluruh Laki-laki
        $data['total_laki_laki'] = data_jemaat::where('jemaat_jenis_kelamin', 'l')->where('jemaat_status_aktif','t')->count();
        //count Total seluruh Perempuan
        $data['total_perempuan'] = data_jemaat::where('jemaat_jenis_kelamin', 'p')->where('jemaat_status_aktif','t')->count();

        return view('pages.index', compact('years','laki','perempuan','thisyear','data'));
    }

    static function countNewDataToday()
    {
        $today = Carbon::today();
        return $total = data_jemaat::where('created_at',$today)->count();
    }
    static function countNewDataWeekly()
    {
        $today = Carbon::today();
        $data_jemaat = data_jemaat::where('created_at', '>', $today->subDays(7))->get();
        $totalCount = $data_jemaat->count(); //Should return your total number of events from past 7 days
        $response = array();
        $i = 0;
        while ($i < 7) {
            $dayOfWeek = $today->subDays($i);
            $totaldataweekly = $data_jemaat->where('created_at', $dayOfWeek);
            $response[$dayOfWeek] = $eventsForThisDay->count();
            $i++;
        }
        return $response;
    }
}
