<?php


namespace App\Http\Controllers;

use App\data_jemaat;
use App\master_pendidikan;
use App\master_lingkungan;
use App\master_pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        // $datajemaats = data_jemaat::all()->where(['jemaat_status_aktif', 't'], ['jemaat_status_aktif', 'f']);
        $datajemaats = data_jemaat::all()->where('jemaat_status_aktif','!=','del');

        // $datajemaats = data_jemaat::all();

        // $datajemaats = DB::select('select * from data_jemaats where jemaat_status_aktif = "t" or jemaat_status_aktif = "f"');

        return view('pages.admin.jemaat.data-jemaat', compact('datajemaats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data_pendidikans = master_pendidikan::all();
        $data_lingkungans = master_lingkungan::all();
        $data_pekerjaans = master_pekerjaan::all();
        $dataKK = data_jemaat::where('jemaat_kk_status', true)->get();
        
        return view('pages.admin.jemaat.tambah-jemaat', compact('data_jemaat', 'data_pendidikans','data_lingkungans','data_pekerjaans', 'dataKK'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_pendidikans = master_pendidikan::all();
        $data_lingkungans = master_lingkungan::all();
        $data_pekerjaans = master_pekerjaan::all();

        $validatedData = $request->validate([
            'jemaat_nama' => 'required',
            'jemaat_gelar_depan' => 'nullable',
            'jemaat_gelar_belakang' => 'nullable',
            // 'jemaat_nama_alias' => ,
            'jemaat_tempat_lahir' => 'required',
            'jemaat_tanggal_lahir' => 'required',
            // 'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            'jemaat_status_perkawinan' => 'required',
            // 'jemaat_tanggal_perkawinan' => request('jemaat_tanggal_perkawinan'),
            'jemaat_tanggal_baptis' => 'required',
            // 'jemaat_tanggal_sidi' => request('jemaat_tanggal_sidi'),            
            'jemaat_tanggal_bergabung' => 'nullable',
            'id_pendidikan_akhir' => 'required',
            'id_lingkungan' => 'required',
            // 'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            // 'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            // 'jemaat_email' => 'email',
            'id_parent' => 'nullable',
            'id_pekerjaan' =>'required',
            'jemaat_status_dikeluarga' => 'required',
            // 'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ],    
        [
            'jemaat_nomor_stambuk.max' => 'Nomor Stambuk hanya 18 karakter',
            'jemaat_nama.required' => 'Harap isi Nama Jemaat',
            'jemaat_tempat_lahir.required' => 'Tempat lahir harus di isi',
            'jemaat_tanggal_lahir.required' => 'Tanggal lahir harus di isi',
            'jemaat_tanggal_baptis.required' => 'Tanggal baptis jemaat harus di isi',
            'jemaat_status_perkawinan.required' => 'Pilih Status Perkawinan',
            'id_lingkungan.required' => 'Nomor Lingkungan wajib di isi',
            'id_pendidikan_akhir.required' => 'Pilih Pendidikan Akhir',
            'id_pekerjaan.required' => 'Pilih pekerjaan',
            'jemaat_status_dikeluarga.required' => 'Pilih salah satu status dikeluarga',
        ]);
        $tl = request('jemaat_tanggal_lahir');
        $tls = substr($tl, 0, 4) . substr($tl, 5, 2) . substr($tl, 8, 2);
        $baptis = request('jemaat_tanggal_baptis');
        $baps = substr($baptis, 0, 4) . substr($baptis, 5, 2);
        $jks;
        $jk = request('jemaat_jenis_kelamin');
        if($jk == 'l'){
            $jks = 1;
        }
        elseif($jk == 'p'){
            $jks = 2;
        }        
        $def="00";
        $plus = 1;
        $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;

        $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
        do {
            $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
            if($check!=null){
                $plus +=1;
            }
            $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
        } while ($check!=null);
        
        
        data_jemaat::create([
            'jemaat_nomor_stambuk' => $nomorstambuk,
            'jemaat_nama' => request('jemaat_nama'),
            'jemaat_gelar_depan' => request('jemaat_gelar_depan'),
            'jemaat_gelar_belakang' => request('jemaat_gelar_belakang'),
            'jemaat_nama_alias' => request('jemaat_nama_alias'),
            'jemaat_tempat_lahir' => request('jemaat_tempat_lahir'),
            'jemaat_tanggal_lahir' => request('jemaat_tanggal_lahir'),
            'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
            'jemaat_tanggal_perkawinan' => request('jemaat_tanggal_perkawinan'),
            'jemaat_tanggal_baptis' => request('jemaat_tanggal_baptis'),
            'jemaat_tanggal_sidi' => request('jemaat_tanggal_sidi'),            
            'jemaat_tanggal_bergabung' => request('jemaat_tanggal_bergabung', '2018-12-31'),
            'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
            'id_lingkungan' => request('id_lingkungan'),
            'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            'jemaat_email' => request('jemaat_email'),
            'id_pekerjaan' => request('id_pekerjaan'),
            'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
            'jemaat_status_aktif' => "t",
            'id_parent' => request('id_parent', null),
            'jemaat_kk_status' => request('jemaat_kk_status', '0'),
            'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ]);
        
        $datajemaats = data_jemaat::all();
        // return view('pages.admin.jemaat.data-jemaat', compact('datajemaats'))->with(['success' => 'Data Jemaat berhasil di Tambahkan']);
        return redirect()->route('datajemaat')->with( ['datajemaats' => $datajemaats])->with(['success' => 'Data Jemaat berhasil di Tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function show(data_jemaat $data_jemaat)
    {
        $parent = $data_jemaat->id_parent;
        $datapanggil = $data_jemaat->jemaat_status_aktif;
        if($data_jemaat->jemaat_status_dikeluarga == 3)
        {
            $dataAyah = data_jemaat::find($data_jemaat->id_parent);
            $dataIbu = data_jemaat::where('id_parent','=', $parent)
                ->where('jemaat_status_dikeluarga','=', "2")->first();
            $saudaras = data_jemaat::where('id_parent', '=', $parent)
                ->where('jemaat_status_dikeluarga', '=', '3')
                ->where('id', '!=', $data_jemaat->id)
                ->orderBy('jemaat_tanggal_lahir', 'ASC')
                ->get();
        }
        else{
            $dataAyah = null;
            $dataIbu = null;
            $saudaras = null;
        }

        if($datapanggil == "del"){
            return redirect()->route('datajemaat');
        }
        else{
            return view('pages.admin.jemaat.profile-jemaat', compact('data_jemaat', 'dataAyah', 'dataIbu', 'saudaras'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function edit(data_jemaat $data_jemaat)
    {
        $this->$data_jemaat = $data_jemaat->id;
        $data_pendidikans = master_pendidikan::all();
        $data_lingkungans = master_lingkungan::all();
        $data_pekerjaans = DB::table('master_pekerjaans')
            ->orderBy('jenis_pekerjaan', 'asc')->get();
        
        // dd($data_pekerjaans);

        return view('pages.admin.jemaat.edit-jemaat', compact('data_jemaat', 'data_pendidikans','data_lingkungans', 'data_pekerjaans'));      
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
            'jemaat_nomor_stambuk' =>request('jemaat_nomor_stambuk'),
            'jemaat_nama' => request('jemaat_nama'),
            'jemaat_gelar_depan' => request('jemaat_gelar_depan'),
            'jemaat_gelar_belakang' => request('jemaat_gelar_belakang'),
            'jemaat_nama_alias' => request('jemaat_nama_alias'),
            'jemaat_tempat_lahir' => request('jemaat_tempat_lahir'),
            'jemaat_tanggal_lahir' => request('jemaat_tanggal_lahir'),
            'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
            'jemaat_tanggal_perkawinan' => request('jemaat_tanggal_perkawinan'),
            'jemaat_tanggal_baptis' => request('jemaat_tanggal_baptis'),
            'jemaat_tanggal_sidi' => request('jemaat_tanggal_sidi'),            
            'jemaat_tanggal_bergabung' => request('jemaat_tanggal_bergabung'),
            'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
            'id_lingkungan' => request('id_lingkungan'),
            'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            'jemaat_email' => request('jemaat_email'),
            'id_pekerjaan' => request('id_pekerjaan'),
            'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
            'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ]);

        return back()->with(['update' => 'Data Jemaat berhasil di ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_jemaat $data_jemaat, $id)
    {
        $data_jemaat = data_jemaat::find($id);
        
        $data_jemaat->update([
            'jemaat_status_aktif' => "del",
        ]);
        return redirect()->route('datajemaat')->with(['delete' => 'Data Jemaat berhasil di hapus']);
    }

    public function updateStatusPensiun(Request $request, $id)
    {
        // dd("hello");
        $data_jemaat = data_jemaat::find($id);
        $data_jemaat->update([
            'jemaat_keterangan_status' => "Pindah",
            'jemaat_status_aktif' => 'f',
            'jemaat_tanggal_status' => request('jemaat_tanggal_status'),
        ]);

        // return "berhasil";

        return back()->with(['update' => 'Data Jemaat berhasil di ubah']);
    }

    public function updateStatusMeninggal(Request $request, $id)
    {
        // dd("hello");
        $data_jemaat = data_jemaat::find($id);
        $data_jemaat->update([
            'jemaat_keterangan_status' => "Meninggal",
            'jemaat_status_aktif' => 'f',
            'jemaat_tanggal_status' => request('jemaat_tanggal_status'),
        ]);

        // return "berhasil";

        return back()->with(['update' => 'Data Jemaat berhasil di ubah']);
    }
}
