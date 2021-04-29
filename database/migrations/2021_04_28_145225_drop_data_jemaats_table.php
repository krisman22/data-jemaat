<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDataJemaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_jemaats', function (Blueprint $table) {
            $table->dropColumn('jemaat_keterangan_status');
            $table->dropColumn('jemaat_tanggal_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_jemaats', function (Blueprint $table) {
            $table->string('jemaat_keterangan_status')->nullable();
            $table->date('jemaat_tanggal_status')->nullable();
        });
    }
}
