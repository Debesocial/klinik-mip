<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstruksiDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruksi_dokters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rawat_inap');
            $table->foreign('id_rawat_inap')->references('id')->on('rawat_inaps');
            $table->date('tanggal');
            $table->time('jam');
            $table->text('hasil_pemeriksaan');
            $table->text('instruksi_pengobatan');
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
        Schema::dropIfExists('instruksi_dokters');
    }
}
