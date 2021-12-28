<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->enum('pengenal', ['KTP', 'Paspor']);
            $table->string('nomor_pengenal', 100);
            $table->string('nama', 100);
            $table->string('alamat', 255);
            $table->string('telepon', 30);
            $table->string('email');
            $table->string('password');
            $table->string('repassword');
            $table->timestamps();
            $table->integer('admin')->default('0');
            $table->integer('is_delete')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamus');
    }
}