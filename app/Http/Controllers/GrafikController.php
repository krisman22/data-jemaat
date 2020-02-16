<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_lingkungan;
use App\data_jemaat;
use App\master_pendidikan;
use App\master_pekerjaan;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function lingkungan()
    {
        return view('pages.grafik.lingkungan');
    }
    public function jenisKelamin()
    {
        $datalingkungans = master_lingkungan::orderBy('nomor_lingkungan', 'ASC')->get();
        $grouped = $datalingkungans->groupBy('nama_lingkungan');
        $data_jenis_kelamin = [];

        $start = microtime(true);
        foreach($datalingkungans as $datalingkungan){
            $data_jenis_kelamin[$datalingkungan->nomor_lingkungan.$datalingkungan->nama_lingkungan] = array('l'=>0,'p'=>0,'t'=>0);
            // $l=0; $p=0; $t=0;

            $l = data_jemaat::select('jemaat_nama','id_lingkungan','jemaat_jenis_kelamin')
                ->where('jemaat_status_aktif','t')
                ->where('id_lingkungan',$datalingkungan->nomor_lingkungan)
                ->where('jemaat_jenis_kelamin','l')
                ->count();
            $p = data_jemaat::select('jemaat_nama','id_lingkungan','jemaat_jenis_kelamin')
                ->where('jemaat_status_aktif','t')
                ->where('id_lingkungan',$datalingkungan->nomor_lingkungan)
                ->where('jemaat_jenis_kelamin','p')
                ->count();
            $t = $l+$p;


            // foreach($data_jemaats as $data_jemaat){
            //     if($data_jemaat->id_lingkungan == $datalingkungan->nomor_lingkungan && $data_jemaat->jemaat_jenis_kelamin == 'l'){
            //         $l+=1;
            //     }
            //     else if($data_jemaat->id_lingkungan == $datalingkungan->nomor_lingkungan && $data_jemaat->jemaat_jenis_kelamin == 'p'){
            //         $p+=1;
            //     }
            //     if($data_jemaat->id_lingkungan == $datalingkungan->nomor_lingkungan){
            //         $t+=1;
            //     }
            // }

            $data_jenis_kelamin[$datalingkungan->nomor_lingkungan.$datalingkungan->nama_lingkungan] = array('l'=>$l,'p'=>$p,'t'=>$t);
        }
        // Execute the query
        $time = microtime(true) - $start;

        dd($time);

        // $data_jenis_kelamin['1Pasar'] = array('p'=>3,'l'=>2,'total'=>5);

       
        
        // foreach($data_jenis_kelamin as $data){
        //     dd($data);
        // }

        dd($data_jenis_kelamin);

        return view('pages.grafik.jeniskelamin', compact('datalingkungans'));
    }
    public function jenisUsia()
    {
        return view('pages.grafik.jenisusia');
    }
    public function statusPerkawinan()
    {
        return view('pages.grafik.statusperkawinan');
    }
    public function pendidikan()
    {
        return view('pages.grafik.pendidikan');
    }
    public function pekerjaan()
    {
        return view('pages.grafik.pekerjaan');
    }
    public function jemaatBergabung()
    {
        return view('pages.grafik.jemaatbergabung');
    }

}
