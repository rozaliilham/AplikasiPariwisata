<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnReservasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->foreignId('homestay_id');
            $table->foreignId('user_id');
            $table->foreignId('check_out_id');
            $table->integer('total');
            $table->string('midtrans_booking_code')->nullable();
            $table->string('midtrans_url')->nullable();
            $table->string('payment_status', 100)->default('waiting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            //
        });
    }
}
