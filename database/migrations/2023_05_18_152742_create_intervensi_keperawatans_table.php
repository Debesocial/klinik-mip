<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervensiKeperawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervensi_keperawatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rawat_inap');
            $table->foreign('id_rawat_inap')->references('id')->on('rawat_inaps');
            $table->text('anamnesis');
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->float('suhu_tubuh');
            $table->float('tekanan_darah');
            $table->float('denyut_nadi');
            $table->float('denyut_nadi_menit');
            $table->float('laju_pernapasan');
            $table->float('laju_pernapasan_menit');
            $table->float('saturasi_oksigen');
            $table->text('pemeriksaan_penunjang');
            $table->text('catatan_pemeriksaan');
            $table->json('tindakan');
            $table->text('catatan');
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
        Schema::dropIfExists('intervensi_keperawatans');
    }
}
