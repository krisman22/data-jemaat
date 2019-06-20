<?php

namespace App;
use App\data_jemaat;

use Illuminate\Database\Eloquent\Model;

class master_pendidikan extends Model
{
    public function data_jemaat()
    {
        return $this->hasOne('App\data_jemaat');
    }
}
