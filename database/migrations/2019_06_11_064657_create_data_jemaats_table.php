<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataJemaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jemaats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jemaat_nomor_stambuk')->unsigned();
            $table->string('jemaat_nama');
            $table->string('jemaat_gelar_depan')->nullable();
            $table->string('jemaat_gelar_belakang')->nullable();
            $table->string('jemaat_nama_alias')->nullable();
            $table->string('jemaat_tempat_lahir');
            $table->string('jemaat_tanggal_lahir');
            $table->string('jemaat_jenis_kelamin');
            $table->string('jemaat_jemaat_baptis');
            $table->string('jemaat_tanggal_sidi');
            $table->string('jemaat_status_perkawinan');
            $table->string('jemaat_tanggal_perkawinan')->nullable();
            $table->string('id_pendidikan_akhir');
            $table->string('id_lingkungan');
            $table->string('jemaat_tanggal_bergabung');
            $table->string('jemaat_alamat_rumah')->nullable();
            $table->string('jemaat_nomor_hp')->nullable();
            $table->string('jemaat_email')->nullable();
            $table->string('jemaat_status_aktif');
            $table->string('jemaat_keterangan_status')->nullable();
            $table->string('jemaat_tanggal_meninggal')->nullable();
            $table->string('id_pekerjaan');
            $table->string('jemaat_status_dikerluarga');
            $table->string('parent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_jemaats');
    }
}
