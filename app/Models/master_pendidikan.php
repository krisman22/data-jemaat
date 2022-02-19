<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class master_pendidikan extends Model
{
    public function data_jemaat()
    {
        return $this->hasOne('App\Models\data_jemaat');
    }
}
