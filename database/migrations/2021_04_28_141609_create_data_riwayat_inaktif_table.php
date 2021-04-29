<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRiwayatInaktifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_riwayat_inaktif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_stambuk');
            $table->string('jemaat_keterangan_status');
            $table->date('jemaat_tanggal_status')->nullable();
            $table->date('jemaat_tanggal_dikebumikan')->nullable();
            $table->string('jemaat_pindah_ke')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_riwayat_inaktif');
    }
}
