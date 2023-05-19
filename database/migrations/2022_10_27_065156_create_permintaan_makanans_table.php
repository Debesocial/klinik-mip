<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_makanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rawat_inap');
            $table->foreign('id_rawat_inap')->references('id')->on('rawat_inaps');
            $table->foreignId('nama_penyakit_id')->constrained();
            $table->string('permintaan_makanan');
            $table->string('catatan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('ttd');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('permintaan_makanans');
    }
}
