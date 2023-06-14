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
            // $table->string('id_rawat_jalan');
            $table->date('tanggal_kejadian');
            $table->foreignId('lokasi')->constrained('lokasi_kejadians');
            $table->string('pengantar');
            $table->string('anamnesis');
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->float('suhu_tubuh');
            $table->float('tekanan_darah');
            $table->float('denyut_nadi');
            $table->float('denyut_nadi_menit');
            $table->float('laju_pernapasan');
            $table->float('laju_pernapasan_menit');
            $table->float('saturasi_oksigen');
            $table->text('status_lokalis');
            $table->string('pemeriksaan_penunjang')->nullable();
            $table->text('obat_konsumsi')->nullable();
            $table->json('nama_penyakit_id');
            $table->json('tindakan');
            $table->json('resep');
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
