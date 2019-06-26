<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\master_pendidikan;

class data_jemaat extends Model
{

    protected $fillable = [
        'jemaat_nomor_stambuk','jemaat_nama','jemaat_gelar_depan','jemaat_gelar_belakang','jemaat_nama_alias','jemaat_tempat_lahir','jemaat_tanggal_lahir','jemaat_jenis_kelamin','jemaat_tanggal_baptis','jemaat_tanggal_sidi','jemaat_status_perkawinan','jemaat_tanggal_perkawinan','id_pendidikan_akhir','id_lingkungan','jemaat_tanggal_bergabung','jemaat_alamat_rumah','jemaat_nomor_hp','jemaat_email','jemaat_status_aktif','jemaat_keterangan_status','jemaat_tanggal_status','id_pekerjaan','jemaat_status_dikeluarga','id_parent','jemaat_golongan_darah'

    ];

    protected $dates=[
        'jemaat_tanggal_lahir', 'jemaat_tanggal_status', 'jemaat_tanggal_baptis', 'jemaat_tanggal_sidi', 'jemaat_tanggal_bergabung','jemaat_tanggal_perkawinan'
    ];
    
    
    public function getAge(){
        return $this->jemaat_tanggal_lahir->diff(Carbon::now())
        ->format('%y Tahun, %m Bulan, %d Hari');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\master_pendidikan', 'id_pendidikan_akhir');
    }

    public function lingkungan()
    {
        return $this->belongsTo('\App\master_lingkungan', 'id_lingkungan');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('\App\master_pekerjaan', 'id_pekerjaan');
    }
    
}