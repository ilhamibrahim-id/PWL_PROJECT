<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KelasMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_kelas_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kelas_id")->nullable();
            $table->unsignedBigInteger("matakuliah_id")->nullable();
            $table->foreign("kelas_id")->references('id')->on('table_kelas');
            $table->foreign("matakuliah_id")->references('id')->on('table_matakuliah');
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
        Schema::dropIfExists('table_kelas_matakuliah');
    }
}
