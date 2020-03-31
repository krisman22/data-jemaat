<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_lingkungan;

class DataMasterController extends Controller
{
    public function index()
    {
        $data_lingkungan = master_lingkungan::all();

        return view('pages.data-master.lingkungan', compact('data_lingkungan'));
    }
    public function storeLingkungan(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_lingkungan' => 'required|numeric',
            'nama_lingkungan' => 'required',
            'nama_snk' => 'required',
        ],    
        [
            'nomor_lingkungan.required' => 'Nomor Lingkungan harus diisi',
            'nomor_lingkungan.numeric' => 'Nomor Lingkungan harus angka',
            'nama_lingkungan.required' => 'Nama Lingkungan harus diisi',
            'nama_snk.required' => 'Nama Satua Niha Keriso harus diisi',
        ]);

        master_lingkungan::updateOrCreate(['nomor_lingkungan' => $request->nomor_lingkungan],
                ['nama_lingkungan' => $request->nama_lingkungan, 'nama_snk' => $request->nama_snk]);        
   
        return redirect()->route('datalingkungan')->with( ['data_lingkungan' => datalingkungan()])->with(['success' => 'Data Lingkungan berhasil ditambahkan']);        
    }

    static function datalingkungan()
    {
        return master_lingkungan::all();
    }
}
