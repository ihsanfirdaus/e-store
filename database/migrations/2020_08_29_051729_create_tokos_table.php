<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });

        Schema::create('toko_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_toko');
            $table->unsignedBigInteger('id_produk');
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
        Schema::dropIfExists('tokos');
    }
}
