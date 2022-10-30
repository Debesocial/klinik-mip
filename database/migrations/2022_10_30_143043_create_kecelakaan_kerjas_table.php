<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecelakaanKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecelakaan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->date('kejadian');
            $table->date('kontrol_kembali');
            $table->string('pengantar');
            $table->foreignId('rekam_medis_id')->constrained();
            $table->string('anamnesis');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('suhu_tubuh');
            $table->string('tekanan_darah');
            $table->string('denyut_nadi');
            $table->string('laju_pernapasan');
            $table->string('saturasi');
            $table->string('status');
            $table->foreignId('nama_penyakit_id')->constrained();
            $table->string('sekunder')->nullable();
            $table->string('terapi');
            $table->foreignId('tindakan_id')->constrained();
            $table->string('alkes');
            $table->string('pengguna');
            $table->string('keterangan');
            $table->string('nama_obat')->nullable();
            $table->string('jumlah_obat')->nullable();
            $table->string('aturan')->nullable();
            $table->string('keterangan_obat')->nullable();;
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
        Schema::dropIfExists('kecelakaan_kerjas');
    }
}
