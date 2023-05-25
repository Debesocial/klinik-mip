<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->string('id_rawat_inap');
            $table->date('mulai_rawat');
            $table->date('berakhir_rawat')->nullable();
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
            $table->string('dokumen')->nullable();
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
        Schema::dropIfExists('rawat_inaps');
    }
}
