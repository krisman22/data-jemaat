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
            $table->increments('id')->unique();
            $table->string('jemaat_nomor_stambuk', 18);
            $table->string('jemaat_nama');
            $table->string('jemaat_gelar_depan')->nullable();
            $table->string('jemaat_gelar_belakang')->nullable();
            $table->string('jemaat_nama_alias')->nullable();
            $table->string('jemaat_tempat_lahir');
            $table->date('jemaat_tanggal_lahir');
            $table->string('jemaat_jenis_kelamin');
            $table->date('jemaat_tanggal_baptis')->nullable();
            $table->date('jemaat_tanggal_sidi')->nullable();
            $table->string('jemaat_status_perkawinan')->nullable();
            $table->date('jemaat_tanggal_perkawinan')->nullable();
            $table->integer('id_pendidikan_akhir')->unsigned();
            $table->integer('id_lingkungan')->unsigned();
            $table->date('jemaat_tanggal_bergabung')->default('2018-12-31'); 
            $table->string('jemaat_alamat_rumah')->nullable();
            $table->string('jemaat_nomor_hp')->nullable();
            $table->string('jemaat_email')->nullable();
            $table->string('jemaat_status_aktif');
            $table->string('jemaat_keterangan_status')->nullable();
            $table->date('jemaat_tanggal_status')->nullable();
            $table->integer('id_pekerjaan')->unsigned();
            $table->string('jemaat_status_dikeluarga');
            $table->integer('id_parent')->unsigned();
            $table->string('jemaat_golongan_darah');
            $table->timestamps();

            $table->foreign('id_pendidikan_akhir')
                ->references('id')
                ->on('master_pendidikans');
            $table->foreign('id_lingkungan')
                ->references('nomor_lingkungan')
                ->on('master_lingkungans');
            $table->foreign('id_pekerjaan')
                ->references('id')
                ->on('master_pekerjaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('data_jemaats');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
