<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_jemaat;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\master_pendidikan;

class LaporanController extends Controller
{
    public function tahunan()
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

        return view('pages.laporan.tahunan', compact('dataLingkungan','pendidikan'));
    }

    public function statistik()
    {
        //get data lingkungan
        $lingkungan = master_lingkungan::all();

        //count jumlah jemaat dengan masing masing tingkat pendidikan
        foreach($lingkungan as $d){
            //count Jumlah Kepala keluarga setiap lingkungan
            $jumlahKK[$d->nomor_lingkungan]['jumlahKK'] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_kk_status', true)->where('jemaat_status_aktif','t')->count();
            
            //count Jumlah seluruh data Jemaat (jiwa) setiap lingkungan
            $jumlahJiwa[$d->nomor_lingkungan]['jumlahJiwa'] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')->count();

            //count Jumlah jiwa laki/perempuan tiap lingkungan, Dewasa >17 Tahun dan Anak <17 Tahun
            $DL = 0;
            $AL = 0;
            $DP = 0;
            $AP = 0;
            $tempOfJumlahJiwaL = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_jenis_kelamin','l')->where('jemaat_status_aktif','t')->get();
                    foreach($tempOfJumlahJiwaL as $data){
                        if($data->countAge() >= 17 ){
                            $DL += 1;
                        }
                        else{
                            $AL += 1;
                        }
                    }
                    
            $tempOfJumlahJiwaP = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_jenis_kelamin','p')->where('jemaat_status_aktif','t')->get();
                    foreach($tempOfJumlahJiwaP as $data){
                        if($data->countAge() >= 17 ){
                            $DP += 1;
                        }
                        else{
                            $AP += 1;
                        }
                    }

            $jumlahJiwa[$d->nomor_lingkungan]['dewasa']['l'] = $DL;
            $jumlahJiwa[$d->nomor_lingkungan]['dewasa']['p'] = $DP;
            $jumlahJiwa[$d->nomor_lingkungan]['anak']['l'] = $AL;
            $jumlahJiwa[$d->nomor_lingkungan]['anak']['p'] = $AP;


            //count jumlah setiap pendidikan akhir tiap lingkungan
            $pendidikan[$d->nomor_lingkungan][2] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','2')->where('jemaat_status_aktif','t') //SD
                ->count();

            $pendidikan[$d->nomor_lingkungan][3] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','3')->where('jemaat_status_aktif','t') //SMP
                ->count();

            $pendidikan[$d->nomor_lingkungan][4] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','4')->where('jemaat_status_aktif','t') //SMA
                ->count();

            $pendidikan[$d->nomor_lingkungan][5] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','5')->where('jemaat_status_aktif','t') //D1
                ->count();

            $pendidikan[$d->nomor_lingkungan][6] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','6')->where('jemaat_status_aktif','t') //D2
                ->count();

            $pendidikan[$d->nomor_lingkungan][7] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','7')->where('jemaat_status_aktif','t') //D3
                ->count();
                
            $pendidikan[$d->nomor_lingkungan][8] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','8')->where('jemaat_status_aktif','t') //D4
                ->count();

            $pendidikan[$d->nomor_lingkungan][9] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','9')->where('jemaat_status_aktif','t') // S1
                ->count();

            $pendidikan[$d->nomor_lingkungan][10] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','10')->where('jemaat_status_aktif','t') //S2
                ->count();

            $pendidikan[$d->nomor_lingkungan][11] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('id_pendidikan_akhir','11')->where('jemaat_status_aktif','t') //S3
                ->count();

            $pendidikan[$d->nomor_lingkungan]["dll"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->whereIn('id_pendidikan_akhir',[1, 12])//Belum sekolah, TK
                ->count();

            //count jumlah jemaat dengan masing masing pekerjaan
            $pekerjaan[$d->nomor_lingkungan]["pns"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','1') //PNS
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["wiraswasta"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','2') //Wiraswasta
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["tnipolri"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->whereIn('id_pekerjaan',['3', '4']) //TNI / Polri
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["petani"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','6') //Petani
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["peternak"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','7') //Peternakan
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["pedagang"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','5') //Pedagang
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["tukang"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->whereIn('id_pekerjaan',['24', '25', '26', '27', '28', '29', '30', '31']) //Tukang
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["nelayan"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','8') //Nelayan
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["karyawanswasta"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->where('id_pekerjaan','15') //Karyawan Swasta
                ->count();
            $pekerjaan[$d->nomor_lingkungan]["dll"] = data_jemaat::where('id_lingkungan', $d->nomor_lingkungan)
                ->where('jemaat_status_aktif','t')
                ->whereNotIn('id_pekerjaan',[1,2,3,4,5,6,7,8,15,24,25,26,27,28,29,30,31,])
                ->count();
        }
        
        return view('pages.laporan.statistik', compact('lingkungan', 'pendidikan', 'pekerjaan', 'jumlahKK', 'jumlahJiwa'));
    }
}
