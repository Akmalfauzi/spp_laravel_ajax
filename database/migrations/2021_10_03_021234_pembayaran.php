<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_bayar');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('jumlah_bayar');
            $table->timestamps();
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('petugas_id');

            $table->foreign('murid_id')->references('id')->on('murid')->onDelete('cascade');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
