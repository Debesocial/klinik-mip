<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinIstirahatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_istirahats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->string('keluhan');
            $table->foreignId('diagnosa')->constrained('nama_penyakits');
            $table->foreignId('diagnosa_sekunder')->constrained('nama_penyakits');
            $table->string('tindakan');
            $table->foreignId('alkes_id')->constrained();
            $table->string('jumlah_pengguna');
            $table->string('keterangan');
            $table->json('terapi');
            $table->integer('rekomendasi');
            $table->text('dapat_bekerja_catatan')->nullable();
            $table->date('dari')->nullable();
            $table->date('sampai')->nullable();
            $table->foreignId('spesialis_rujukan_id')->nullable()->constrained();
            $table->foreignId('rumah_sakit_rujukan_id')->nullable()->constrained();
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
        Schema::dropIfExists('izin_istirahats');
    }
}
