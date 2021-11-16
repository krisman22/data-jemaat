<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    protected $fillable = [
        'no_stambuk', 'nama_ayah', 'id_ayah','nama_ibu','id_ibu','nama_keluarga','status_hubungan'
    ];
    public $timestamps = false;

    public function ayah()
    {
        return $this->belongsTo('\App\data_jemaat', 'id_ayah', 'id');
    }
    public function ibu()
    {
        return $this->belongsTo('\App\data_jemaat', 'id_ibu', 'id');
    }
}
