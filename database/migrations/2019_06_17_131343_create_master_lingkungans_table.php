<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterLingkungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_lingkungans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomor_lingkungan')->unsigned()->unique();
            $table->string('nama_lingkungan');
            $table->integer('id_jemaat_snk');
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
        Schema::dropIfExists('master_lingkungans');
    }
}
