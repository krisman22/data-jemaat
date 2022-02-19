<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master_lingkungan;
use App\Models\data_jemaat;
use App\Models\master_pendidikan;
use App\Models\master_pekerjaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;



class RekapDataController extends Controller
{
    public function lingkungan()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
        $data_jemaats=[];
        $total = 0;
        foreach($grouped as $data=>$lingkungans){
            $group_jemaat_total = 0;
            foreach($lingkungans as $lingkungan){
                $jumlah_jemaat = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->count();

                $data_jemaats[$lingkungan->nomor_lingkungan] = $jumlah_jemaat;
                $group_jemaat_total += $jumlah_jemaat;
            }
            $data_jemaats[$data] = $group_jemaat_total;
            $total += $group_jemaat_total;
        }
        $data_jemaats['total']=$total;

        return view('pages.rekapData.lingkungan', compact('grouped','data_jemaats'));
    }

    public function kepalakeluarga()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
        $data_kks=[];
        $total = 0;
        foreach($grouped as $data=>$lingkungans){
            $group_jemaat_total = 0;
            foreach($lingkungans as $lingkungan){
                $jumlah_jemaat = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_kk_status', true)
                    ->count();

                $data_kks[$lingkungan->nomor_lingkungan] = $jumlah_jemaat;
                $group_jemaat_total += $jumlah_jemaat;
            }
            $data_kks[$data] = $group_jemaat_total;
            $total += $group_jemaat_total;
        }
        $data_kks['total']=$total;

        // dd($data_kks);

        return view('pages.rekapData.kepalakeluarga', compact('grouped','data_kks'));
    }

    public function jeniskelamin()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
       
        $dataJK = [];
        
        $total_L=0;
        $total_P=0;
        $total_T=0;
        foreach($grouped as $data=>$lingkungans){
            $groupL=0;
            $groupP=0;
            $groupT=0;
            foreach($lingkungans as $lingkungan){
                $l = data_jemaat::where('jemaat_status_aktif', 't')
                    ->where('id_lingkungan', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_jenis_kelamin', 'l')
                    ->count();
                $p = data_jemaat::where('jemaat_status_aktif', 't')
                    ->where('id_lingkungan', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_jenis_kelamin', 'p')
                    ->count();
                $t = $l+$p;

                $dataJK[$lingkungan->nomor_lingkungan.$lingkungan->nama_lingkungan.'l']=$l;
                $dataJK[$lingkungan->nomor_lingkungan.$lingkungan->nama_lingkungan.'p']=$p;
                $dataJK[$lingkungan->nomor_lingkungan.$lingkungan->nama_lingkungan.'t']=$t;
                $groupL += $l;
                $groupP += $p;
                $groupT += $t;
            }
            $dataJK[$data.'l']=$groupL;
            $dataJK[$data.'p']=$groupP;
            $dataJK[$data.'t']=$groupT;
            $total_L += $groupL;
            $total_P += $groupP;
            $total_T += $groupT;
        }
        $dataJK['totalL'] = $total_L;
        $dataJK['totalP'] = $total_P;    
        $dataJK['totalT'] = $total_T;    

        return view('pages.rekapData.jeniskelamin', compact('grouped','dataJK'));
    }

    public function jenisusia()
    {
        $datajemaats = data_jemaat::where('jemaat_status_aktif', '=', 't')->get();
        $balita = 0;
        $kanak_kanak = 0;
        $remaja_awal = 0;
        $remaja_akhir = 0;
        $dewasa = 0;
        $dewasa_akhir = 0;
        $lansia_awal = 0;
        $lansia_akhir = 0;
        $manula = 0;
        foreach($datajemaats as $datajemaat){
            if($datajemaat->getAge() >= 0 && $datajemaat->getAge() <= 4){
                $balita += 1;
            }
            elseif($datajemaat->getAge() >= 5 && $datajemaat->getAge() <= 11){
                $kanak_kanak += 1;
            }
            elseif($datajemaat->getAge() >= 12 && $datajemaat->getAge() <= 16){
                $remaja_awal += 1;
            }
            elseif($datajemaat->getAge() >= 17 && $datajemaat->getAge() <= 25){
                $remaja_akhir += 1;
            }
            elseif($datajemaat->getAge() >= 26 && $datajemaat->getAge() <= 35){
                $dewasa += 1;
            }
            elseif($datajemaat->getAge() >= 36 && $datajemaat->getAge() <= 45){
                $dewasa_akhir += 1;
            }
            elseif($datajemaat->getAge() >= 46 && $datajemaat->getAge() <= 55){
                $lansia_awal += 1;
            }
            elseif($datajemaat->getAge() >= 56 && $datajemaat->getAge() <= 65){
                $lansia_akhir += 1;
            }
            else{
                $manula +=1;
            }
        }
        $kategoriumurs = [
            'balita'=>$balita,
            'kanak-kanak'=>$kanak_kanak,
            'remaja_awal'=>$remaja_awal,
            'remaja_akhir'=>$remaja_akhir,
            'dewasa'=>$dewasa,
            'dewasa_akhir'=>$dewasa_akhir,
            'lansia_awal'=>$lansia_awal,
            'lansia_akhir'=>$lansia_akhir,
            'manula'=>$manula,            
        ];

        return view('pages.rekapData.jenisusia', compact('kategoriumurs'));
    }
    public function statusperkawinan()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
        $jumlah_total_lingkungan=[];
        $jumlah_total_lingkungan_kawin=[];
        $jumlah_total_lingkungan_belumkawin=[];
        $jumlah_total_lingkungan_duda=[];
        $jumlah_total_lingkungan_janda=[];
        $jumlah_jemaats=[];
        $jumlah_jemaats_kawin=[];
        $jumlah_jemaats_belumkawin=[];
        $jumlah_jemaats_duda=[];
        $jumlah_jemaats_janda=[];
        $total_status_kawin = data_jemaat::where('jemaat_status_aktif', '=', 't')
            ->where('jemaat_status_perkawinan', '=', '1')
            ->count();
        $total_status_belumkawin = data_jemaat::where('jemaat_status_aktif', '=', 't')
            ->where('jemaat_status_perkawinan', '=', '2')
            ->count();
        $total_status_duda = data_jemaat::where('jemaat_status_aktif', '=', 't')
            ->where('jemaat_status_perkawinan', '=', '3')
            ->count();
        $total_status_janda = data_jemaat::where('jemaat_status_aktif', '=', 't')
            ->where('jemaat_status_perkawinan', '=', '4')
            ->count();
        $jumlah_jemaats['kawin']=$total_status_kawin;
        $jumlah_jemaats['belumkawin']=$total_status_belumkawin;
        $jumlah_jemaats['duda']=$total_status_duda;
        $jumlah_jemaats['janda']=$total_status_janda;

        $datas = data_jemaat::where('jemaat_status_aktif', '=', 't')->count();
        $jumlah_jemaats['total_jemaat']=$datas;
        
        foreach($grouped as $data=>$lingkungans){
            $totalData = 0;
            $totalData_sp_kawin = 0;
            $totalData_sp_belumkawin = 0;
            $totalData_sp_duda = 0;
            $totalData_sp_janda = 0;
            foreach($lingkungans as $lingkungan){
                $datas = data_jemaat::where('jemaat_status_aktif', '=', 't')->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)->count();
                $datas_sp_kawin = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_status_perkawinan', '=', '1')
                    ->count();
                $datas_sp_belumkawin = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_status_perkawinan', '=', '2')
                    ->count();
                $datas_sp_duda = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_status_perkawinan', '=', '3')
                    ->count();
                $datas_sp_janda = data_jemaat::where('jemaat_status_aktif', '=', 't')
                    ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                    ->where('jemaat_status_perkawinan', '=', '4')
                    ->count();

                $totalData += $datas;
                $totalData_sp_kawin += $datas_sp_kawin;
                $totalData_sp_belumkawin += $datas_sp_belumkawin;
                $totalData_sp_duda += $datas_sp_duda;
                $totalData_sp_janda += $datas_sp_janda;
                $jumlah_jemaats[$lingkungan->nomor_lingkungan] = $datas;
                $jumlah_jemaats_kawin[$lingkungan->nomor_lingkungan]=$datas_sp_kawin;
                $jumlah_jemaats_belumkawin[$lingkungan->nomor_lingkungan]=$datas_sp_belumkawin;
                $jumlah_jemaats_duda[$lingkungan->nomor_lingkungan]=$datas_sp_duda;
                $jumlah_jemaats_janda[$lingkungan->nomor_lingkungan]=$datas_sp_janda;
            
            }
            $jumlah_total_lingkungan[$data] = $totalData;
            $jumlah_total_lingkungan_kawin[$data] = $totalData_sp_kawin;
            $jumlah_total_lingkungan_belumkawin[$data] = $totalData_sp_belumkawin;
            $jumlah_total_lingkungan_duda[$data] = $totalData_sp_duda;
            $jumlah_total_lingkungan_janda[$data] = $totalData_sp_janda;
        }

        return view('pages.rekapData.statusperkawinan', compact('grouped','jumlah_total_lingkungan','jumlah_total_lingkungan_kawin','jumlah_total_lingkungan_belumkawin','jumlah_total_lingkungan_duda','jumlah_total_lingkungan_janda','jumlah_jemaats','jumlah_jemaats_kawin','jumlah_jemaats_belumkawin','jumlah_jemaats_duda','jumlah_jemaats_janda'));
    }

    public function pendidikan()
    {
        $pendidikans = master_pendidikan::all();
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
        $pend = [];
        $total = 0;
        foreach($grouped as $data=>$lingkungans){
            $groupJumlah = 0;
            foreach($lingkungans as $lingkungan){
                $ling_pend_total = 0;
                foreach($pendidikans as $pendidikan){   
                    if(Arr::exists($pend, $data.$pendidikan->id) != true){
                        $pend[$data.$pendidikan->id] = 0;
                    }
                    else{
                        $pend[$data.$pendidikan->id] = $pend[$data.$pendidikan->id];
                    }
                    if(Arr::exists($pend, 'total'.$pendidikan->id) != true){
                        $pend['total'.$pendidikan->id] = 0;
                    }
                    else{
                        $pend['total'.$pendidikan->id] = $pend['total'.$pendidikan->id];
                    }
                    
                    $j = data_jemaat::where('jemaat_status_aktif', '=', 't')
                        ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                        ->where('id_pendidikan_akhir', '=', $pendidikan->id)
                        ->count();

                    $pend[$lingkungan->nomor_lingkungan.$pendidikan->id] = $j;
                    $pend[$data.$pendidikan->id] += $j;

                    $ling_pend_total += $j;
                    $pend['total'.$pendidikan->id] += $j;
                }
                $groupJumlah += $ling_pend_total;   
                $pend[$lingkungan->nomor_lingkungan.'jumlah'] = $ling_pend_total;
            }
            $pend[$data.'total'] = $groupJumlah;
            $total += $groupJumlah;
        }
        $pend['total'] = $total;
        return view('pages.rekapData.pendidikan', compact('grouped','pendidikans','pend'));      
    }

    public function pekerjaan()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');

        $data_pekerjaans = master_pekerjaan::all();
        $data_pekerjaan_perlingkungan = 0;
        $id_pekerjaan = null;

        return view('pages.rekapData.pekerjaan', compact('grouped','data_pekerjaans', 'data_pekerjaan_perlingkungan', 'id_pekerjaan'));
    }

    public function getPekerjaan(Request $request)
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');

        $data_pekerjaans = master_pekerjaan::all();

        $kk_filter = request('id_jemaatfilter');

        $id_pekerjaan = request('id_pekerjaan');
        $nama_pekerjaan = master_pekerjaan::where('id', $id_pekerjaan)->first();

        $data_pekerjaan_perlingkungan=[];

        $total_jemaat_per_perkerjaan=0;

        foreach($grouped as $data=>$lingkungans){
            $total_data_pekerjaan=0;
            foreach($lingkungans as $lingkungan){
                if($kk_filter == 't'){
                    $data_pekerjaan = data_jemaat::where('jemaat_status_aktif', '=', 't')
                        ->where('jemaat_kk_status', true)
                        ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                        ->where('id_pekerjaan', '=', $id_pekerjaan)
                        ->count();
                }
                else{
                    $data_pekerjaan = data_jemaat::where('jemaat_status_aktif', '=', 't')
                        ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
                        ->where('id_pekerjaan', '=', $id_pekerjaan)
                        ->count();
                }
                $data_pekerjaan_perlingkungan[$lingkungan->nomor_lingkungan]= $data_pekerjaan;
                $total_data_pekerjaan += $data_pekerjaan;
            }
            $data_pekerjaan_perlingkungan[$data] = $total_data_pekerjaan;
            $total_jemaat_per_perkerjaan += $total_data_pekerjaan;

        }
        $data_pekerjaan_perlingkungan["total"] = $total_jemaat_per_perkerjaan;

        return view('pages.rekapData.pekerjaan', compact('grouped','data_pekerjaans', 'data_pekerjaan_perlingkungan', 'id_pekerjaan','nama_pekerjaan'));
    }
    

    // public function jemaatbergabung()
    // {
    //     $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
    //     $grouped = $datalingkungans->groupBy('nama_lingkungan');

    //     $datetime = Carbon::now();
    //     $thisyear = $datetime->year;
    //     $year_min1 = $thisyear - 1;
    //     $year_min2 = $thisyear - 2;

    //     $data_jemaat_bergabung = [];

    //     $rekap2018 = 0;
    //     $rekap2019 = 0;
    //     $rekap2020 = 0;
    //     $total_akhir = 0;

    //     foreach($grouped as $data=>$lingkungans){
    //         $total_tahun2018 = 0;
    //         $total_tahun2019 = 0;
    //         $total_tahun2020 = 0;
    //         $total_rekap = 0;
    //         foreach($lingkungans as $lingkungan){
    //             $tahun2018 = 0; //2
    //             $tahun2019 = 0;
    //             $tahun2020 = 0;

    //             $data_jemaats_bergabung = data_jemaat::where('jemaat_status_aktif', '=', 't')
    //                 ->where('id_lingkungan', '=', $lingkungan->nomor_lingkungan)
    //                 ->get();

                
    //             foreach($data_jemaats_bergabung as $data_bergabung){
    //                 if($data_bergabung->getYearBergabung() == 2018){
    //                     $tahun2018 += 1;
    //                 }
    //                 elseif($data_bergabung->getYearBergabung() == 2019){
    //                     $tahun2019 += 1;
    //                 }
    //                 elseif($data_bergabung->getYearBergabung() == 2020){
    //                     $tahun2020 += 1;
    //                 }
    //             }

    //             if(Arr::exists($data_jemaat_bergabung, $data.'2018') != true){
    //                 $data_jemaat_bergabung[$data.'2018'] = 0;
    //             }
    //             else{
    //                 $data_jemaat_bergabung[$data.'2018'] = $data_jemaat_bergabung[$data.'2018'];
    //             }
    //             if(Arr::exists($data_jemaat_bergabung, $data.'2019') != true){
    //                 $data_jemaat_bergabung[$data.'2019'] = 0;
    //             }
    //             else{
    //                 $data_jemaat_bergabung[$data.'2019'] = $data_jemaat_bergabung[$data.'2019'];
    //             }
    //             if(Arr::exists($data_jemaat_bergabung, $data.'2020') != true){
    //                 $data_jemaat_bergabung[$data.'2020'] = 0;
    //             }
    //             else{
    //                 $data_jemaat_bergabung[$data.'2020'] = $data_jemaat_bergabung[$data.'2020'];
    //             }
                

    //             $data_jemaat_bergabung[$lingkungan->nomor_lingkungan.'2018'] = $tahun2018;
    //             $data_jemaat_bergabung[$lingkungan->nomor_lingkungan.'2019'] = $tahun2019;
    //             $data_jemaat_bergabung[$lingkungan->nomor_lingkungan.'2020'] = $tahun2020;

    //             $total_tahun2018 += $tahun2018;                
    //             $total_tahun2019 += $tahun2019;                
    //             $total_tahun2020 += $tahun2020; 
    //         }
    //         $data_jemaat_bergabung[$data.'2018'] += $total_tahun2018;
    //         $data_jemaat_bergabung[$data.'2019'] += $total_tahun2019;
    //         $data_jemaat_bergabung[$data.'2020'] += $total_tahun2020;

    //         $rekap2018 += $total_tahun2018;
    //         $rekap2019 += $total_tahun2019;
    //         $rekap2020 += $total_tahun2020;

    //         $total_rekap = $total_rekap + $total_tahun2018 + $total_tahun2019 + $total_tahun2020;

            
    //         $data_jemaat_bergabung[$data.'rekap'] = $total_rekap;
    //     }
    //     $data_jemaat_bergabung['rekap2018'] = $rekap2018;
    //     $data_jemaat_bergabung['rekap2019'] = $rekap2019;
    //     $data_jemaat_bergabung['rekap2020'] = $rekap2020;

    //     $total_akhir = $total_akhir + $rekap2018 + $rekap2019 + $rekap2020;
    //     $data_jemaat_bergabung['totalakhir'] = $total_akhir;

    //     return view('pages.rekapData.jemaatbergabung', compact('grouped', 'data_jemaat_bergabung'));   
    // }

    public function jemaatbergabung()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');

        $thisyear = Carbon::now()->year;
        $year_min1 = $thisyear - 1;
        $year_min2 = $thisyear - 2;
        $years = [$year_min2,$year_min1,$thisyear];

        $bergabung = [];
        $total_under = 0;
        $bergabung['total'.$thisyear] = 0;
        $bergabung['total'.$year_min1] = 0;
        $bergabung['total'.$year_min2] = 0;

        foreach($grouped as $data=>$lingkungans){
            $jumlah_under = 0;
            foreach($lingkungans as $lingkungan){
                $jum_ling_tahun = 0;
                $total_tahun = 0;
                $ju = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, id_lingkungan FROM data_jemaats where jemaat_status_aktif = 't' AND id_lingkungan = '$lingkungan->nomor_lingkungan' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED) < '$year_min2'"));
                $bergabung[$lingkungan->nomor_lingkungan.'under'] = $ju;
                foreach($years as $year){
                    if(Arr::exists($bergabung, $data.'-'.$year) != true){
                        $bergabung[$data.'-'.$year] = 0;
                    }
                    else{
                        $bergabung[$data.'-'.$year] = $bergabung[$data.'-'.$year];
                    }
                    if(Arr::exists($bergabung, 'total'.$data) != true){
                        $bergabung['total'.$data] = 0;
                    }
                    else{
                        $bergabung['total'.$data] = $bergabung['total'.$data];
                    }                    

                    $j = count(DB::select("SELECT CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED), jemaat_status_aktif, id_lingkungan FROM data_jemaats where jemaat_status_aktif = 't' AND id_lingkungan = '$lingkungan->nomor_lingkungan' AND CAST(SUBSTRING(jemaat_tanggal_bergabung, 1, 4) AS UNSIGNED)='$year'"));
                    
                    $bergabung[$lingkungan->nomor_lingkungan.$year] = $j;
                    $total_tahun = $total_tahun + $j;
                    $bergabung[$data.'-'.$year] += $j;
                    $bergabung['total'.$data] += $j;
                    $bergabung['total'.$year] += $j;
                }
                $bergabung['total'.$data] += $ju;
                $jum_ling_tahun = $total_tahun + $ju;
                $bergabung['jumlah'.$lingkungan->nomor_lingkungan] = $jum_ling_tahun;
                $jumlah_under += $ju;
            }
            $bergabung['jumlah-under'.$data] = $jumlah_under;
            $total_under += $jumlah_under;
        }
        $bergabung['total-under'] = $total_under;
        
        $bergabung['total-akhir'] = $bergabung['total-under'] + $bergabung['total'.$year_min2] + $bergabung['total'.$year_min1] + $bergabung['total'.$thisyear];

        return view('pages.rekapData.jemaatbergabung', compact('grouped', 'bergabung','years','thisyear','year_min1', 'year_min2'));   
    }
}
