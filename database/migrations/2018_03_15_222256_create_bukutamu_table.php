<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukutamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukutamu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ortu', 64);
            $table->string('nama_siswa', 64);
            $table->string('kelas', 16);
            $table->string('no_hp', 16);
            $table->string('foto_bukutamu', 32);
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
        Schema::dropIfExists('bukutamu');
    }
}
