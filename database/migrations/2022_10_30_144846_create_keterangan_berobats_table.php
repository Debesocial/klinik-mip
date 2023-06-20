<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganBerobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_berobats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->foreignId('rumah_sakit_rujukans_id')->constrained();
            $table->string('rs_lain')->nullable();
            $table->foreignId('nama_penyakit_id')->constrained();
            $table->foreignId('sekunder')->nullable()->constrained('nama_penyakits');
            $table->text('resep');
            $table->text('saran');
            $table->boolean('kontrol');
            $table->date('tanggal_kembali')->nullable();
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
        Schema::dropIfExists('keterangan_berobats');
    }
}
