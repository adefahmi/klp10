<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->integer('quantity');
            $table->foreignId('kamar_id');
            $table->enum('status', ['Belum Terbayar', 'Terbayar', 'Verifikasi', 'Verifikasi Ditolak', 'Gagal', 'Selesai']);
            $table->string('bukti_transfer')->nullable();
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
        Schema::dropIfExists('booking_details');
    }
}