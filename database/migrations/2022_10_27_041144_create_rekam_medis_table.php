<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->date('kontrol_kembali');
            $table->string('anamnesis');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('suhu_badan');
            $table->string('tekanan_darah');
            $table->string('denyut_nadi');
            $table->string('laju_pernapasan');
            $table->string('saturasi_oksigen');
            $table->string('status_lokalis');
            $table->string('pemeriksaan_penunjang');
            $table->foreignId('nama_penyakit_id')->constrained();
            $table->string('obat_dikonsumsi');
            $table->text('dokumen');
            $table->foreignId('tindakan_id')->constrained();
            $table->string('nama_alat');
            $table->string('jumlah_pengguna');
            $table->string('keterangan');
            $table->string('nama_obat');
            $table->string('jumlah_obat');
            $table->string('aturan');
            $table->string('keterangan_obat');
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
        Schema::dropIfExists('rekam_medis');
    }
}
