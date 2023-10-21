<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->foreignId('user_id');
            $table->string('jenis_usaha');
            $table->string('alamat');
            $table->string('produk');
            $table->string('image');
            $table->string('merk');
            $table->string('harga');
            $table->string('telp');
            $table->integer('stok');
            $table->string('status');
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
        Schema::dropIfExists('produks');
    }
}
