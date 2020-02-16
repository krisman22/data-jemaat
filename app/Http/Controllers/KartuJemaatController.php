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
                        ->where('jemaat_status_aktif','!=','del')
                        ->get();

        return view('pages.kartujemaat.kartujemaat', compact('datajemaats'));
    }

    public function show(data_jemaat $data_jemaat)
    {
        $idparent = $data_jemaat->id;     
        
        $dataKartuKeluargas = data_jemaat::where('id_parent', '=', $idparent)
            ->where('jemaat_status_aktif', '=', 't')
            ->orderBy('jemaat_status_dikeluarga', 'ASC')
            ->orderBy('jemaat_tanggal_lahir', 'ASC')
            ->get();            
        
        $data_keluargas = DB::table('data_jemaats')
            ->select('data_keluargas.no_stambuk','data_keluargas.nama_ayah','data_keluargas.nama_ibu')
            ->join('data_keluargas','data_keluargas.no_stambuk','=','data_jemaats.jemaat_nomor_stambuk')
            ->where(['data_jemaats.id_parent' => $idparent])
            ->get();
        
        return view('pages.kartujemaat.detail-kartu', 
            compact('data_jemaat','dataKartuKeluargas','data_keluargas'));
        
    }

    public function cetak_pdf(data_jemaat $data_jemaat)
    {
        $idparent = $data_jemaat->id;     
        
        $dataKartuKeluargas = data_jemaat::where('id_parent', '=', $idparent)
            ->where('jemaat_status_aktif', '=', 't')
            ->orderBy('jemaat_status_dikeluarga', 'ASC')
            ->orderBy('jemaat_tanggal_lahir', 'ASC')
            ->get();            
        
        $data_keluargas = DB::table('data_jemaats')
            ->select('data_keluargas.no_stambuk','data_keluargas.nama_ayah','data_keluargas.nama_ibu')
            ->join('data_keluargas','data_keluargas.no_stambuk','=','data_jemaats.jemaat_nomor_stambuk')
            ->where(['data_jemaats.id_parent' => $idparent])
            ->get();

        $name = $data_jemaat->id_lingkungan . '_' . $data_jemaat->jemaat_nama . '.pdf';
        $customPaper = array(0,0,609.44,935.43);

        $pdf = PDF::loadView('pages.kartujemaat.pdf-view',
            compact('data_jemaat','dataKartuKeluargas','data_keluargas'))
                ->setPaper($customPaper, 'landscape');
        
        return $pdf->download($name);
    }

    public function cetakkartu()
    {
        $id = 123456;
        
        $data = [
          'content' => 'Lorem lorem lorem data lorem 2'];

        // $datajemaats = data_jemaat::where('jemaat_kk_status', '=', true)
        //                 ->where('jemaat_status_aktif','!=','del')
        //                 ->get();

        $pdf = PDF::loadView('pages.kartujemaat.contoh_pdf', $data);
        $name = $id . '_' . date('m-d-Y') . '.pdf';
        return $pdf->download($name);
    }
}
