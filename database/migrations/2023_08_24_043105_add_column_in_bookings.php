<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
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
        Schema::table('Bookings', function (Blueprint $table) {
            $table->removeColumn("check_in");
            $table->removeColumn("checK_out");
            $table->removeColumn("durasi_booking");
            $table->removeColumn("total");

        });
    }
}
