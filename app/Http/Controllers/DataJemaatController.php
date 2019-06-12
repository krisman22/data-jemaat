<?php

namespace App\Http\Controllers;

use App\data_jemaat;
use Illuminate\Http\Request;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datajemaats = data_jemaat::all();
        

        return view('pages.admin.jemaat.data-jemaat', compact('datajemaats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function show(data_jemaat $data_jemaat)
    {
        return view('pages.admin.jemaat.profile-jemaat', compact('data_jemaat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_jemaat = data_jemaat::find($id);
        
        return view('pages.admin.jemaat.edit-jemaat', compact('data_jemaat'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_jemaat = data_jemaat::find($id);
        $data_jemaat->update([
            'jemaat_nama' => request('jemaat_nama'),
            // 'jemaat_nomor_stambuk' =>request('jemaat_nomor_stambuk'),
            // 'jemaat_gelar_depan','jemaat_gelar_belakang','jemaat_nama_alias','jemaat_tempat_lahir','jemaat_tanggal_lahir','jemaat_jenis_kelamin','jemaat_tanggal_baptis','jemaat_tanggal_sidi','jemaat_status_perkawinan','jemaat_tanggal_perkawinan','id_pendidikan_akhir','id_lingkungan','jemaat_tanggal_bergabung','jemaat_alamat_rumah','jemaat_nomor_hp','jemaat_email','jemaat_status','jemaat_keterangan_status','jemaat_tanggal_meninggal','id_pekerjaan','jemaat_status_dikeluarga','parent_id'

        ]);

        return \Redirect::back()->with(['update' => 'Data Jemaat berhasil di ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_jemaat $data_jemaat)
    {
        //
    }
}
