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
        
        return view('pages.admin.jemaat.tambah-jemaat', compact('data_jemaat', 'data_pendidikans','data_lingkungans','data_pekerjaans'));
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
            'jemaat_nomor_stambuk' => 'nullable|required|unique:data_jemaats|max:18',
            'jemaat_nama' => 'required',
            'jemaat_gelar_depan' => 'nullable',
            'jemaat_gelar_belakang' => 'nullable',
            // 'jemaat_nama_alias' => ,
            // 'jemaat_tempat_lahir' => 'required',
            // 'jemaat_tanggal_lahir' => request('jemaat_tanggal_lahir'),
            // 'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            // 'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
            // 'jemaat_tanggal_perkawinan' => request('jemaat_tanggal_perkawinan'),
            // 'jemaat_tanggal_baptis' => request('jemaat_tanggal_baptis'),
            // 'jemaat_tanggal_sidi' => request('jemaat_tanggal_sidi'),            
            // 'jemaat_tanggal_bergabung' => request('jemaat_tanggal_bergabung'),
            // 'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
            // 'id_lingkungan' => request('id_lingkungan'),
            // 'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            // 'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            // 'jemaat_email' => 'email',
            // 'id_pekerjaan' => request('id_pekerjaan'),
            // 'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
            // 'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ],    
        [
            'jemaat_nomor_stambuk.required' => 'Harap isi Nomor Stambuk',
            'jemaat_nomor_stambuk.unique' => 'Nomor Stambuk tidak boleh sama',
            'jemaat_nomor_stambuk.max' => 'Nomor Stambuk hanya 18 karakter',
            'jemaat_nama.required' => 'Harap isi Nama Jemaat',
            // 'jemaat_gelar_depan.regex' => 'Gelar depan tidak boleh pakai angka',
            // 'jemaat_gelar_belakang.regex' => 'Gelar belakang tidak boleh pakai angka',
        ]);
        
        
        data_jemaat::create([
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
            'jemaat_status_aktif' => "t",
            'id_parent' => 0,
            'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ]);
        
        $datajemaats = data_jemaat::all();
        return view('pages.admin.jemaat.data-jemaat', compact('datajemaats'))->with(['success' => 'Data Jemaat berhasil di Tambahkan']);
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
        $dataAyah = data_jemaat::find($data_jemaat->id_parent);
        $dataIbu = data_jemaat::where('id_parent','=', $parent)
            ->where('jemaat_status_dikeluarga','=', "1")->first();
        // dd($dataIbu->jemaat_nama);

        if($datapanggil == "del"){
            return redirect()->route('datajemaat');
        }
        else{
            return view('pages.admin.jemaat.profile-jemaat', compact('data_jemaat', 'dataAyah', 'dataIbu'));
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
