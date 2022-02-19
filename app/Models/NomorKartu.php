<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NomorKartu extends Model
{
    protected $fillable = ['no_stambuk','nomor_kartu'];
    protected $table = 'data_nomor_kartu';
    public $timestamps = false;
}
