<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tarif');
            $table->string('jenis_usaha');
            $table->string('lokasi');
            $table->string('provinsi');
            $table->foreignId('kabupaten_id');
            $table->foreignId('kecamatan_id');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('lat');
            $table->string('lng');
            $table->string('image');
            $table->integer('views');
            $table->text('ket');
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
        Schema::dropIfExists('wisatas');
    }
}
