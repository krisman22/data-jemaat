<?php


namespace App\Http\Controllers;

use DataTables;
use App\Models\data_jemaat;
use App\Models\DataKeluarga;
use App\Models\RiwayatInaktif;
use App\Models\master_pekerjaan;
use App\Models\master_lingkungan;
use App\Models\master_pendidikan;
use Illuminate\Http\Request;
use App\Exports\DataJemaatExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\DataJemaatStore;

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
        $dataAyah = data_jemaat::where('jemaat_status_aktif','t')
            ->where('jemaat_jenis_kelamin', 'l')
            ->where('jemaat_status_perkawinan', '!=', 2)
            ->get();
        $dataIbu = data_jemaat::where('jemaat_status_aktif','t')
            ->where('jemaat_jenis_kelamin', 'p')
            ->where('jemaat_status_perkawinan', '!=', 2)
            ->get();
        
        return view('pages.jemaat.tambah-jemaat', compact('data_pendidikans','data_lingkungans','data_pekerjaans', 'dataKK', 'dataAyah', 'dataIbu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataJemaatStore $request)
    {
        $idParent=(data_jemaat::orderBy('id', 'desc')->first()->id)+1;
        $nomorstambuk = $this->generateNomorStambuk($request);

        DB::beginTransaction();
        try {
            data_jemaat::create([
                'jemaat_nomor_stambuk' => $nomorstambuk,
                'jemaat_nama' => request('jemaat_nama'),
                'jemaat_gelar_depan' => request('jemaat_gelar_depan'),
                'jemaat_gelar_belakang' => request('jemaat_gelar_belakang'),
                'jemaat_nama_alias' => request('jemaat_nama_alias'),
                'jemaat_tempat_lahir' => request('jemaat_tempat_lahir'),
                'jemaat_tanggal_lahir' => $this->transformDate($request->jemaat_tanggal_lahir),
                'jemaat_jenis_kelamin' => request('jemaat_jenis_kelamin'),
                'jemaat_status_perkawinan' => request('jemaat_status_perkawinan'),
                'jemaat_tanggal_perkawinan' => $this->transformDate($request->jemaat_tanggal_perkawinan),
                'jemaat_tanggal_baptis' => $this->transformDate($request->jemaat_tanggal_baptis),
                'jemaat_tanggal_sidi' => $this->transformDate($request->jemaat_tanggal_sidi),            
                'jemaat_tanggal_bergabung' => $this->transformDate($request->jemaat_tanggal_bergabung) ?? "2018-12-31",
                'id_pendidikan_akhir' => request('id_pendidikan_akhir'),
                'id_lingkungan' => request('id_lingkungan'),
                'jemaat_alamat_rumah' => request('jemaat_alamat_rumah'),
                'jemaat_nomor_hp' => request('jemaat_nomor_hp'),
                'jemaat_email' => request('jemaat_email'),
                'id_pekerjaan' => request('id_pekerjaan'),
                'jemaat_status_dikeluarga' => request('jemaat_status_dikeluarga'),
                'jemaat_status_aktif' => "t",
                'id_parent' => request('id_parent', $idParent),
                'jemaat_kk_status' => request('jemaat_kk_status', '0'),
                'jemaat_golongan_darah' => request('jemaat_golongan_darah'),
            ]);

            DataKeluarga::create([
                'no_stambuk' => $nomorstambuk,
                'nama_ayah' => $request->namaAyah,
                'id_ayah' => $request->id_ayah,
                'nama_ibu' => $request->namaIbu,
                'id_ibu' => $request->id_ibu,
                'status_hubungan' => 1,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => 'Error ada kesalahan perubahan data']);
        }
        
        return redirect()->route('datajemaat')->with(['success' => 'Data Jemaat berhasil di Tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_jemaat  $data_jemaat
     * @return \Illuminate\Http\Response
     */
    public function show(data_jemaat $data_jemaat)
    {
        $parent = $data_jemaat->id_parent;
        $idjemaat = $data_jemaat->id;
        $dataKeluarga = DataKeluarga::with('ayah', 'ibu')->where('no_stambuk', '=', $data_jemaat->jemaat_nomor_stambuk)
            ->where('status_hubungan', '=', 1)->first();

        $kepalaKeluarga = data_jemaat::where('id_parent', $parent)->where('jemaat_kk_status', true)->first();
            
        return view('pages.jemaat.profile-jemaat', compact('data_jemaat', 'dataKeluarga', 'kepalaKeluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_jemaat  $data_jemaat
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
     * @param  \App\Models\data_jemaat  $data_jemaat
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
     * @param  \App\Models\data_jemaat  $data_jemaat
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

    public function generateNomorStambuk($request)
    {
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

        if($check){
            $plus += 1;
            $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus; 
        }

        return $nomorstambuk;
    }

    public function transformDate($date)
    {
        if($date == null){
            return null;
        }
        $time = strtotime(str_replace('/', '-', $date));
        return date('Y-m-d',$time);
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

            //Cari apakah data tunggal, sehingga tidak perlu mengubah otomatis kepala keluarga
            $isSingleData = data_jemaat::where('id_parent', $data_jemaat->id_parent)->where('jemaat_status_aktif', 't')
                            ->count();

            if($isSingleData > 0){
                if($data_jemaat->jemaat_status_dikeluarga == 1 && $data_jemaat->jemaat_status_perkawinan == 1){
                    $dataSI = data_jemaat::where('id_parent', $data_jemaat->id_parent)
                        ->where('jemaat_status_dikeluarga','2')    
                        ->first();
                    
                    if($dataSI->jemaat_jenis_kelamin == 'l'){
                        $dataSI->jemaat_status_perkawinan = 3; //Duda
                        $dataSI->save();
                    }
                    else{
                        $dataSI->jemaat_status_perkawinan = 4; //Janda
                        $dataSI->save();
                    }
                }
                else if($data_jemaat->jemaat_status_dikeluarga == 2 && $data_jemaat->jemaat_status_perkawinan == 1){
                    $dataSI = data_jemaat::where('id_parent', $data_jemaat->id_parent)
                        ->where('jemaat_status_dikeluarga','1')    
                        ->first();
                    
                    if($dataSI->jemaat_jenis_kelamin == 'l'){
                        $dataSI->jemaat_status_perkawinan = 3; //Duda
                        $dataSI->save();
                    }
                    else{
                        $dataSI->jemaat_status_perkawinan = 4; //Janda
                        $dataSI->save();
                    }
                }
    
                if($data_jemaat->jemaat_kk_status == true){
                    $switchKK = data_jemaat::where('id_parent', $id)
                        ->where('jemaat_status_aktif', 't')
                        ->orderBy('jemaat_status_dikeluarga','asc')
                        ->orderBy('jemaat_tanggal_lahir','desc')
                        ->first();

                    $isSibling = false;
                    if($switchKK->jemaat_status_dikeluarga == 3){
                        $isSibling = true;
                    }
                    
                    $dataKeluargas = data_jemaat::where('id_parent', $id)->get();
                    foreach($dataKeluargas as $dataKeluarga){
                        $dataKeluarga->id_parent = $switchKK->id; //Ganti id parent ke id_kk baru
                        if($isSibling == true && $dataKeluarga->jemaat_status_dikeluarga == 3){ //check if siblings and family member is 3 (anak)
                            $dataKeluarga->jemaat_status_dikeluarga = 5; //if new parent is Anak, change another anak to Saudara Kandung
                        }
                        $dataKeluarga->save();
                    } 

                    $switchKK->jemaat_status_dikeluarga = 1;
                    $switchKK->jemaat_kk_status = true;
                    $switchKK->save();
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

    public function updateDataKeluarga(Request $request, $id)
    {
        $data = DataKeluarga::findOrFail($id);

        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->save();
    }
}
