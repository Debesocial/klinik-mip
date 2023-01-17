<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcuBerkalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcu_berkalas', function (Blueprint $table) {
            $table->id();
            $table->string('id_mcu_berkala');
            $table->foreignId('pasien_id')->constrained();
            $table->string('hasil_rekomendasi');
            $table->string('deskripsi_hasil');
            $table->string('deskripsi_obat');
            $table->string('tanggal_pemeriksaan');
            $table->string('rekomendasi');
            $table->string('jenis_pemeriksaan');
            $table->string('status');
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
        Schema::dropIfExists('mcu_berkalas');
    }
}
