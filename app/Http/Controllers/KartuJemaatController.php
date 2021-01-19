<?php

namespace App\Http\Controllers;

use App\data_jemaat;
use App\master_pendidikan;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\NomorKartu;
use Storage;

class KartuJemaatController extends Controller
{
    /**
     * Show the application Kartu Jemaat Menu.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index()
    {
        $datajemaats = data_jemaat::where('jemaat_kk_status', '=', true)
                        ->where('jemaat_status_aktif','t')
                        ->get();

        return view('pages.kartujemaat.kartujemaat', compact('datajemaats'));
    }

    public function show(data_jemaat $data_jemaat)
    {
        $idparent = $data_jemaat->id;
        $isNomorKartu = NomorKartu::where('no_stambuk', $data_jemaat->jemaat_nomor_stambuk)->first();
        
        $lastId = NomorKartu::orderBy('id', 'desc')->first();
        if($isNomorKartu == null){
            $nomor_kartu = str_pad(($lastId->id+1), 6, '0', STR_PAD_LEFT);
            $nomor = new NomorKartu;
            $nomor->no_stambuk = $data_jemaat->jemaat_nomor_stambuk;
            $nomor->nomor_kartu = $nomor_kartu;
            $nomor->save();
        }
        else{
            $nomor_kartu = $isNomorKartu->nomor_kartu;
        }

        $dataKartuKeluargas = data_jemaat::with('datakeluarga')
            ->where('id_parent', '=', $idparent)
            ->where('jemaat_status_aktif', '=', 't')
            ->orderBy('jemaat_status_dikeluarga', 'ASC')
            ->orderBy('jemaat_tanggal_lahir', 'ASC')
            ->get();

        $name = $data_jemaat->id_lingkungan . '_' . $data_jemaat->jemaat_nama . '.pdf';
        $customPaper = array(0,0,609.44,935.43);

        $pdf = PDF::loadView('pages.kartujemaat.pdf-view',
            compact('data_jemaat','dataKartuKeluargas','nomor_kartu'))
                ->setPaper($customPaper, 'landscape');
        
        return $pdf->stream();
        
    }

    public function cetak_pdf(data_jemaat $data_jemaat)
    {
        $idparent = $data_jemaat->id;
        $isNomorKartu = NomorKartu::where('no_stambuk', $data_jemaat->jemaat_nomor_stambuk)->first();
        
        // generate nomor kartu
        // $dataKK = data_jemaat::where('jemaat_status_aktif', 't')
        // ->where('jemaat_kk_status', true)
        // ->orderBy('jemaat_nama', 'asc')
        // ->get();
        
        // foreach($dataKK as $data){
        //     $adaIsi = NomorKartu::where('no_stambuk', $data->jemaat_nomor_stambuk)->first();
        //     $lastId = NomorKartu::orderBy('id', 'desc')->first();
            
        //     if($adaIsi == null){
        //         $nomor_kartu = str_pad(($lastId->id+1), 6, '0', STR_PAD_LEFT);
        //         $nomor = new NomorKartu;
        //         $nomor->no_stambuk = $data->jemaat_nomor_stambuk;
        //         $nomor->nomor_kartu = $nomor_kartu;
        //         $nomor->save();
        //     }
        //     else{
        //         $nomor_kartu = $adaIsi->nomor_kartu;
        //     }
        // }

        $lastId = NomorKartu::orderBy('id', 'desc')->first();
        if($isNomorKartu == null){
            $nomor_kartu = str_pad(($lastId->id+1), 6, '0', STR_PAD_LEFT);
            $nomor = new NomorKartu;
            $nomor->no_stambuk = $data_jemaat->jemaat_nomor_stambuk;
            $nomor->nomor_kartu = $nomor_kartu;
            $nomor->save();
        }
        else{
            $nomor_kartu = $isNomorKartu->nomor_kartu;
        }

        $dataKartuKeluargas = data_jemaat::with('datakeluarga')
            ->where('id_parent', '=', $idparent)
            ->where('jemaat_status_aktif', '=', 't')
            ->orderBy('jemaat_status_dikeluarga', 'ASC')
            ->orderBy('jemaat_tanggal_lahir', 'ASC')
            ->get();

        $name = $data_jemaat->id_lingkungan . '_' . $data_jemaat->jemaat_nama . '.pdf';
        $customPaper = array(0,0,609.44,935.43);

        $pdf = PDF::loadView('pages.kartujemaat.pdf-view',
            compact('data_jemaat','dataKartuKeluargas','nomor_kartu'))
                ->setPaper($customPaper, 'landscape');
        
        return $pdf->download($name);
    }

    public function downloadZip()
    {
        // set_time_limit(300);
        $dataAllKk = data_jemaat::where('jemaat_kk_status', '=', true)
                        ->where('jemaat_status_aktif','t')
                        ->get();

        foreach($dataAllKk as $data_jemaat){
            $idparent = $data_jemaat->id;
            $nomor_kartu = NomorKartu::where('no_stambuk', $data_jemaat->jemaat_nomor_stambuk)->first()->nomor_kartu ?? null;

            $dataKartuKeluargas = data_jemaat::with('datakeluarga')
                ->where('id_parent', '=', $idparent)
                ->where('jemaat_status_aktif', '=', 't')
                ->orderBy('jemaat_status_dikeluarga', 'ASC')
                ->orderBy('jemaat_tanggal_lahir', 'ASC')
                ->get();            
            
            $name = $data_jemaat->id_lingkungan . '_' . $data_jemaat->jemaat_nama . '.pdf';
            $customPaper = array(0,0,609.44,935.43);

            $pdf = PDF::loadView('pages.kartujemaat.pdf-view',
                compact('data_jemaat','dataKartuKeluargas','nomor_kartu'))
                    ->setPaper($customPaper, 'landscape');
            Storage::put('public/kartu-keluarga/'.$name, $pdf->output());
        }
    }
    
}
