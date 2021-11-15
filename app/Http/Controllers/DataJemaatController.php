<?php


namespace App\Http\Controllers;

use App\data_jemaat;
use App\master_pendidikan;
use App\master_lingkungan;
use App\master_pekerjaan;
use App\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\DataJemaatExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\RiwayatInaktif;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index(Request $request)
    {
        $datajemaats = data_jemaat::where('jemaat_status_aktif','t');

        if($request->ajax()){  
            return DataTables::of($datajemaats)
                ->editColumn('lingkungan', function($datajemaats) { 
                    return $datajemaats->id_lingkungan . ' - ' . $datajemaats->lingkungan->nama_lingkungan ;
                })
                ->addColumn('jemaat_status_aktif', function($datajemaats) { return '<span class="label label-primary">Aktif</span>'; })
                ->addColumn('action', function($data){
                    $button = '<a href="'. Route('profiledetail', $data->id) .'" target="_blank" class="btn btn-icon btn-sm btn-primary" id="btnDetail" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye" style="width: 20px;"></i>Lihat</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="'. Route('jemaateditprofile', $data->id) .'" target="_blank" class="btn btn-icon btn-sm btn-warning" id="btnEdit" data-toggle="tooltip" data-placement="top" title="Edit"><i i class="fa fa-edit" style="width:20px"></i>Edit</a>';
                    return $button;
                })
                ->rawColumns(['action','jemaat_status_aktif'])
                ->addIndexColumn()
                ->make(true);
        }
            
        return view('pages.jemaat.data-jemaat');

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
        $dataKK = data_jemaat::where('jemaat_kk_status', true)->where('jemaat_status_aktif', 't')->get();
        
        return view('pages.jemaat.tambah-jemaat', compact('data_pendidikans','data_lingkungans','data_pekerjaans', 'dataKK'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data_pendidikans = master_pendidikan::all();
        $data_lingkungans = master_lingkungan::all();
        $data_pekerjaans = master_pekerjaan::all();

        $validatedData = $request->validate([
            'jemaat_nama' => 'required',
            'jemaat_gelar_depan' => 'nullable',
            'jemaat_gelar_belakang' => 'nullable',
            'jemaat_tempat_lahir' => 'required',
            'jemaat_tanggal_lahir' => 'required',
            'jemaat_jenis_kelamin' => 'required',
            'jemaat_status_perkawinan' => 'required',
            // 'jemaat_tanggal_perkawinan' => request('jemaat_tanggal_perkawinan'),
            // 'jemaat_tanggal_baptis' => 'required',
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
            'id_parent' => 'required_without:jemaat_kk_status',
        ],    
        [
            'jemaat_nomor_stambuk.max' => 'Nomor Stambuk hanya 18 karakter',
            'jemaat_nama.required' => 'Harap isi Nama Jemaat',
            'jemaat_tempat_lahir.required' => 'Tempat lahir harus di isi',
            'jemaat_jenis_kelamin.required' => 'Pilih jenis kelamin',
            'jemaat_tanggal_lahir.required' => 'Tanggal lahir harus di isi',
            // 'jemaat_tanggal_baptis.required' => 'Tanggal baptis jemaat harus di isi',
            'jemaat_status_perkawinan.required' => 'Pilih Status Perkawinan',
            'id_lingkungan.required' => 'Nomor Lingkungan wajib di isi',
            'id_pendidikan_akhir.required' => 'Pilih Pendidikan Akhir',
            'id_pekerjaan.required' => 'Pilih pekerjaan',
            'jemaat_status_dikeluarga.required' => 'Pilih salah satu status dikeluarga',
            'id_parent.required_without' => 'Pilih kepala keluarga',
        ]);
        
        $date1 = request('jemaat_tanggal_lahir');
        $date2 = request('jemaat_tanggal_perkawinan');
        if(request('jemaat_tanggal_baptis') != null){
            $date3 = request('jemaat_tanggal_baptis');
        }
        else{
            $date3 = '00-00-0000';
        }        
        $date4 = request('jemaat_tanggal_sidi');
        if(request('jemaat_tanggal_bergabung') != null){
            $date5 = request('jemaat_tanggal_bergabung');
        }
        else{
            $date5 = '2018-12-31';
        }

        $tglLahir = str_replace('/', '-', $date1);
        $tglperkawinan = str_replace('/', '-', $date2);
        $tglbaptis = str_replace('/', '-', $date3);
        $tglsidi = str_replace('/', '-', $date4);
        $tglbergabung = str_replace('/', '-', $date5);

        $tglLahir = date('Y-m-d', strtotime($tglLahir));
        if(request('jemaat_tanggal_perkawinan') != null){
            $tglperkawinan = date('Y-m-d', strtotime($tglperkawinan));
        } else{
            $tglperkawinan = request('jemaat_tanggal_perkawinan');
        }
        if(request('jemaat_tanggal_baptis') != null){
            $tglbaptis = date('Y-m-d', strtotime($tglbaptis));
        }else{
            $tglbaptis = request('jemaat_tanggal_baptis');
        }
        if(request('jemaat_tanggal_sidi') != null){
            $tglsidi = date('Y-m-d', strtotime($tglsidi));
        } else {
            $tglsidi = request('jemaat_tanggal_sidi');
        }
        $tglbergabung = date('Y-m-d', strtotime($tglbergabung));
        
        $tls = substr($tglLahir, 0, 4) . substr($tglLahir, 5, 2) . substr($tglLahir, 8, 2);
        if(request('jemaat_tanggal_baptis') != null){
            $baps = substr($tglbaptis, 0, 4) . substr($tglbaptis, 5, 2);
        }else{
            $baps = substr($date3, 6, 4) . substr($date3, 3, 2);
        }
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
            if(strlen($nomorstambuk) == '19'){
                $def = "0";
                $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;            
            }
            elseif(strlen($nomorstambuk) == '20'){
                $def = "";
                $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
            }
            $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
            if($check!=null){
                $plus +=1;
            }
            $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
        } while ($check!=null);
        
        $idPar=(data_jemaat::all()->last()->id)+1;

        data_jemaat::create([
            'jemaat_nomor_stambuk' => $nomorstambuk,
            'jemaat_nama' => request('jemaat_nama'),
            'jemaat_gelar_depan' => request('jemaat_gelar_depan'),
            'jemaat_gelar_belakang' => request('jemaat_gelar_belakang'),
            'jemaat_nama_alias' => request('jemaat_nama_alias'),
            'jemaat_tempat_lahir' => request('jemaat_tempat_lahir'),
            'jemaat_tanggal_lahir' => $tglLahir,
            'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
            'jemaat_tanggal_perkawinan' => $tglperkawinan,
            'jemaat_tanggal_baptis' => $tglbaptis,
            'jemaat_tanggal_sidi' => $tglsidi,            
            'jemaat_tanggal_bergabung' => $tglbergabung,
            'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
            'id_lingkungan' => request('id_lingkungan'),
            'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            'jemaat_email' => request('jemaat_email'),
            'id_pekerjaan' => request('id_pekerjaan'),
            'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
            'jemaat_status_aktif' => "t",
            'id_parent' => request('id_parent', $idPar),
            'jemaat_kk_status' => request('jemaat_kk_status', '0'),
            'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ]);

        // if(request('jemaat_kk_status') == true){
        //     data_jemaat::update([
        //         'id_parent' => 
        //     ]);
        // }

        DataKeluarga::create([
            'no_stambuk' => $nomorstambuk,
            'nama_ayah' => request('namaAyah'),
            'nama_ibu' => request('namaIbu'),
            'status_hubungan' => 1,
        ]);
        
        $datajemaats = data_jemaat::all();
        // return view('pages.jemaat.data-jemaat', compact('datajemaats'))->with(['success' => 'Data Jemaat berhasil di Tambahkan']);
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
        $idjemaat = $data_jemaat->id;
        $dataKeluargas = DataKeluarga::where('no_stambuk', '=', $data_jemaat->jemaat_nomor_stambuk)
            ->where('status_hubungan', '=', 1)->first();        
        $datapanggil = $data_jemaat->jemaat_status_aktif;
        if($data_jemaat->jemaat_status_dikeluarga == 3 && $parent != null)
        {
            $saudaras = data_jemaat::where('id_parent', '=', $parent)
                ->where('jemaat_status_dikeluarga', '=', '3')
                ->where('id', '!=', $data_jemaat->id)
                ->orderBy('jemaat_tanggal_lahir', 'ASC')
                ->get();
        }
        else{
            $saudaras = null;
        }

        if($dataKeluargas != null){
            $dataAyahnon = $dataKeluargas->nama_ayah;
            $dataIbunon = $dataKeluargas->nama_ibu;
            // dd($dataAyahnon);
        }
        else{
            $dataAyahnon = null;
            $dataIbunon = null;
        }
        
        if($data_jemaat->jemaat_status_dikeluarga == 1 || $data_jemaat->jemaat_status_dikeluarga == 2){
            $anaks = data_jemaat::where('id_parent', '=', $idjemaat)
                ->where('jemaat_status_dikeluarga', '=', '3')
                ->orderBy('jemaat_tanggal_lahir', 'ASC')
                ->get();

            $suami = data_jemaat::where('id_parent', '=', $parent)
                ->where('jemaat_status_dikeluarga', '=', '1')
                ->where('id', '!=', $data_jemaat->id)
                ->where('jemaat_jenis_kelamin', '=', "l")
                ->first();

            $istri = data_jemaat::where('id_parent', '=', $parent)
                ->where('jemaat_status_dikeluarga', '=', '2')
                ->where('id', '!=', $data_jemaat->id)
                ->where('jemaat_jenis_kelamin', '=', "p")
                ->first();
            
            $adiks = data_jemaat::where('id_parent', '=', $idjemaat)
                ->where('jemaat_status_dikeluarga', '=', '5')
                ->orderBy('jemaat_tanggal_lahir', 'ASC')
                ->get();
        }
        else {
            $anaks =null;
            $suami = null;
            $istri = null;
            $adiks = null;
        }

        if($datapanggil == "del"){
            return redirect()->route('datajemaat');
        }
        else{
            return view('pages.jemaat.profile-jemaat', 
            compact('data_jemaat','suami','istri', 'saudaras','adiks','dataAyahnon', 'dataIbunon', 'anaks'));
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
        $no_stambuk = $data_jemaat->jemaat_nomor_stambuk;
        $data_pendidikans = master_pendidikan::all();
        $data_lingkungans = master_lingkungan::all();
        $data_pekerjaans = DB::table('master_pekerjaans')
            ->orderBy('jenis_pekerjaan', 'asc')->get();
        $data_keluarga = DataKeluarga::where('no_stambuk', '=', $no_stambuk)
            ->first();
        // dd($data_keluarga);
        $dataKK = data_jemaat::where('jemaat_kk_status', true)->where('jemaat_status_aktif', 't')->get();



        return view('pages.jemaat.edit-jemaat', compact('data_jemaat', 'data_pendidikans','data_lingkungans', 'data_pekerjaans', 'data_keluarga','dataKK'));      
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
        $nomorstambukOLD = $data_jemaat->jemaat_nomor_stambuk;

        $date1 = request('jemaat_tanggal_lahir');
        $date2 = request('jemaat_tanggal_perkawinan');
        if(request('jemaat_tanggal_baptis') != null){
            $date3 = request('jemaat_tanggal_baptis');
        }
        else{
            $date3 = '00-00-0000';
        }        
        $date4 = request('jemaat_tanggal_sidi');
        if(request('jemaat_tanggal_bergabung') != null){
            $date5 = request('jemaat_tanggal_bergabung');
        }
        else{
            $date5 = '2018-12-31';
        }

        $tglLahir = str_replace('/', '-', $date1);
        $tglperkawinan = str_replace('/', '-', $date2);
        $tglbaptis = str_replace('/', '-', $date3);
        $tglsidi = str_replace('/', '-', $date4);
        $tglbergabung = str_replace('/', '-', $date5);

        $tglLahir = date('Y-m-d', strtotime($tglLahir));
        if(request('jemaat_tanggal_perkawinan') != null){
            $tglperkawinan = date('Y-m-d', strtotime($tglperkawinan));
        } else{
            $tglperkawinan = request('jemaat_tanggal_perkawinan');
        }
        if(request('jemaat_tanggal_baptis') != null){
            $tglbaptis = date('Y-m-d', strtotime($tglbaptis));
        }else{
            $tglbaptis = request('jemaat_tanggal_baptis');
        }
        if(request('jemaat_tanggal_sidi') != null){
            $tglsidi = date('Y-m-d', strtotime($tglsidi));
        } else {
            $tglsidi = request('jemaat_tanggal_sidi');
        }
        $tglbergabung = date('Y-m-d', strtotime($tglbergabung));

        $oldTanggalLahir = date('Y-m-d', strtotime($data_jemaat->jemaat_tanggal_lahir));
        $oldTanggalBaptis = date('Y-m-d', strtotime($data_jemaat->jemaat_tanggal_baptis));
        $oldJenisKelamin = $data_jemaat->jemaat_jenis_kelamin;
        
        if($tglLahir != $oldTanggalLahir || $tglbaptis != $oldTanggalBaptis || request('jemaat_jenis_kelamin') != $oldJenisKelamin){
            $tls = substr($tglLahir, 0, 4) . substr($tglLahir, 5, 2) . substr($tglLahir, 8, 2);
            if(request('jemaat_tanggal_baptis') != null){
                $baps = substr($tglbaptis, 0, 4) . substr($tglbaptis, 5, 2);
            }else{
                $baps = substr($date3, 6, 4) . substr($date3, 3, 2);
            }
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
                if(strlen($nomorstambuk) == '19'){
                    $def = "0";
                    $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;            
                }
                elseif(strlen($nomorstambuk) == '20'){
                    $def = "";
                    $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
                }
                $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
                if($check!=null){
                    $plus +=1;
                }
                $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
            } while ($check!=null);
        }
        else{
            $nomorstambuk = request('jemaat_nomor_stambuk');
        }

        $data_jemaat->update([
            'jemaat_nomor_stambuk' => $nomorstambuk,
            'jemaat_nama' => request('jemaat_nama'),
            'jemaat_gelar_depan' => request('jemaat_gelar_depan'),
            'jemaat_gelar_belakang' => request('jemaat_gelar_belakang'),
            'jemaat_nama_alias' => request('jemaat_nama_alias'),
            'jemaat_tempat_lahir' => request('jemaat_tempat_lahir'),
            'jemaat_tanggal_lahir' => $tglLahir,
            'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
            'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
            'jemaat_tanggal_perkawinan' => $tglperkawinan,
            'jemaat_tanggal_baptis' => $tglbaptis,
            'jemaat_tanggal_sidi' => $tglsidi,            
            'jemaat_tanggal_bergabung' => $tglbergabung,
            'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
            'id_lingkungan' => request('id_lingkungan'),
            'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
            'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
            'jemaat_email' => request('jemaat_email'),
            'id_pekerjaan' => request('id_pekerjaan'),
            'id_parent' => request('id_parent'),
            'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
            'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
        ]);

        $data_keluarga = DataKeluarga::where('no_stambuk', '=', $nomorstambukOLD)->first();
        
        $data_keluarga->update([
            'no_stambuk' => $nomorstambuk,
            'nama_ayah' => request('namaAyah'),
            'nama_ibu' => request('namaIbu'),
        ]);

        /**
         * Anggota keluarga ikut dipindahkan ketika Kepala Keluarga berpindah lingkungan
         */
        if($data_jemaat->jemaat_kk_status == true){
            $dataKeluargas = data_jemaat::where('id_parent', $id)->get();
            foreach($dataKeluargas as $dataKeluarga){
                $dataKeluarga->update([
                    'id_lingkungan' => request('id_lingkungan'),
                ]);
            } 
        }

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

    public function updateStatusPindah(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data_jemaat = data_jemaat::find($id);
            if($data_jemaat->jemaat_kk_status == true){
                $dataKeluargas = data_jemaat::where('id_parent', $id)->get();
                foreach($dataKeluargas as $dataKeluarga){
                    $dataKeluarga->update([
                        'jemaat_status_aktif' => 'f',
                    ]);
                    RiwayatInaktif::create([
                        'no_stambuk' => $dataKeluarga->jemaat_nomor_stambuk,
                        'jemaat_keterangan_status' => "Pindah",
                        'jemaat_tanggal_status' => request('jemaat_tanggal_status'),
                        'jemaat_pindah_ke' => request('jemaat_pindah_ke')
                    ]);
                } 
            }
            else{
                $data_jemaat->jemaat_status_aktif = 'f';
                $data_jemaat->save();
                RiwayatInaktif::create([
                    'no_stambuk' => $data_jemaat->jemaat_nomor_stambuk,
                    'jemaat_keterangan_status' => "Pindah",
                    'jemaat_tanggal_status' => request('jemaat_tanggal_status'),
                    'jemaat_pindah_ke' => request('jemaat_pindah_ke')
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => 'Error ada kesalahan perubahan data']);
        }
        return back()->with(['update' => 'Data Jemaat berhasil di ubah']);
    }

    public function updateStatusMeninggal(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data_jemaat = data_jemaat::find($id);
            $data_jemaat->jemaat_status_aktif = 'f';
            $data_jemaat->save();
            RiwayatInaktif::create([
                'no_stambuk' => $data_jemaat->jemaat_nomor_stambuk,
                'jemaat_keterangan_status' => "Meninggal",
                'jemaat_tanggal_status' => request('jemaat_tanggal_status'),
                'jemaat_tanggal_dikebumikan' => request('jemaat_tanggal_dikebumikan')
            ]);

            //Cari apakah data tungga, sehingga tidak perlu mengubah otomatis kepala keluarga
            $isSingleData = data_jemaat::where('id_parent', $data_jemaat->id_parent)
                            ->count();
            
            if($isSingleData > 1){
                if($data_jemaat->jemaat_status_dikeluarga == 1){
                    $dataSI = data_jemaat::where('id_parent', $data_jemaat->id_parent)
                        ->where('jemaat_status_dikeluarga','2')    
                        ->first();
                    
                    if($dataSI->jemaat_jenis_kelamin == 'l'){
                        $dataSI->jemaat_status_perkawinan = 3;
                        $dataSI->save();
                    }
                    else{
                        $dataSI->jemaat_status_perkawinan = 4;
                        $dataSI->save();
                    }
                }
                else if($data_jemaat->jemaat_status_dikeluarga == 2){
                    $dataSI = data_jemaat::where('id_parent', $data_jemaat->id_parent)
                        ->where('jemaat_status_dikeluarga','1')    
                        ->first();
                    
                    if($dataSI->jemaat_jenis_kelamin == 'l'){
                        $dataSI->jemaat_status_perkawinan = 3;
                        $dataSI->save();
                    }
                    else{
                        $dataSI->jemaat_status_perkawinan = 4;
                        $dataSI->save();
                    }
                }
    
                if($data_jemaat->jemaat_kk_status == true){
                    $switchKK = data_jemaat::where('id_parent', $id)
                        ->where('jemaat_status_aktif', 't')
                        ->orderBy('jemaat_status_dikeluarga','asc')
                        ->orderBy('jemaat_tanggal_lahir','desc')
                        ->first();
                    
                    $switchKK->jemaat_status_dikeluarga = 1;
                    $switchKK->jemaat_kk_status = true;
                    $switchKK->save();
                    
                    $dataKeluargas = data_jemaat::where('id_parent', $id)->get();
                    foreach($dataKeluargas as $dataKeluarga){
                        $dataKeluarga->id_parent = $switchKK->id;
                        $dataKeluarga->save();
                    } 
                }
            }

            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => 'Error ada kesalahan perubahan data']);
        }

        return back()->with(['update' => 'Data Jemaat berhasil di Update']);
    }

    public function jadikankk(Request $request, $id)
    {
        $data_jemaat = data_jemaat::find($id);
        if($data_jemaat->jemaat_kk_status == true){
            return back()->with(['warning' => 'Data Jemaat sudah berstatus kepala keluarga']);
        }
        $data_jemaat->update([
            'jemaat_kk_status' => true,
            'jemaat_status_dikeluarga' => 1,
            'id_parent' => $id
        ]);

        return back()->with(['update' => 'Data Jemaat berhasil dijadikan Kepala Keluarga']);
    }

    public function exportDataJemaat()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        return Excel::download(new DataJemaatExport, 'Data Jemaat ' .$now. '.xlsx');
    }
}
