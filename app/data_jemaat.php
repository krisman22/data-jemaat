<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class data_jemaat extends Model
{
    protected $fillable = [
        'jemaat_nama', 'jemaat_nomor_stambuk','jemaat_nama','jemaat_gelar_depan','jemaat_gelar_belakang','jemaat_nama_alias','jemaat_tempat_lahir','jemaat_tanggal_lahir','jemaat_jenis_kelamin','jemaat_tanggal_baptis','jemaat_tanggal_sidi','jemaat_status_perkawinan','jemaat_tanggal_perkawinan','id_pendidikan_akhir','id_lingkungan','jemaat_tanggal_bergabung','jemaat_alamat_rumah','jemaat_nomor_hp','jemaat_email','jemaat_status','jemaat_keterangan_status','jemaat_tanggal_meninggal','id_pekerjaan','jemaat_status_dikeluarga','parent_id'

    ];

    protected $dates=[
        'jemaat_tanggal_lahir', 'jemaat_tanggal_meninggal',
    ];
    
    
    public function getAge(){
        return $this->jemaat_tanggal_lahir->diff(Carbon::now())
        ->format('%y Tahun, %m Bulan, %d Hari');
    }
    
}
