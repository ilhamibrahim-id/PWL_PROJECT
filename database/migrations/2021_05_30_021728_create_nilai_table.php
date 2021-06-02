<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mahasiswa_id")->nullable();
            $table->unsignedBigInteger("matakuliah_id")->nullable();
            $table->foreign("mahasiswa_id")->references('id')->on('table_mahasiswa');
            $table->foreign("matakuliah_id")->references('id')->on('table_matakuliah');
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('nilai');
    }
}
