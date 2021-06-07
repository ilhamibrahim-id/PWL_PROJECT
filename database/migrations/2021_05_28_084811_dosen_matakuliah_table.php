<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DosenMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_dosen_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("dosen_id")->nullable();
            $table->unsignedBigInteger("matakuliah_id")->nullable();
            $table->foreign("dosen_id")->references('id')->on('table_dosen');
            $table->foreign("matakuliah_id")->references('id')->on('table_matakuliah');
            $table->string('kode_pengajar');
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
        Schema::dropIfExists('table_dosen_matakuliah');
    }
}
