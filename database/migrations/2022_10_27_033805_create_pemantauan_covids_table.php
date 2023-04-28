<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemantauanCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemantauan_covids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->string('no_kamar');
            $table->string('suhu_pagi');
            $table->string('td');
            $table->string('hr');
            $table->string('spo');
            $table->string('gejala')->nullable();;
            $table->string('jenis_pemeriksaan')->nullable();;
            $table->date('tanggal_pemeriksaan');
            $table->string('hasil_laboratorium')->nullable();;
            $table->text('lampiran_laboratorium')->nullable();
            $table->date('tanggal_laboratorium')->nullable();;
            $table->string('hasil_rapid')->nullable();;
            $table->text('lampiran_rapid')->nullable();
            $table->date('tanggal_rapid')->nullable();;
            $table->string('hasil_rontgen')->nullable();;
            $table->text('lampiran_rontgen')->nullable();
            $table->date('tanggal_rontgen')->nullable();;
            $table->string('keterangan')->nullable();;
            $table->date('perjalanan')->nullable();;
            $table->string('asal')->nullable();;
            $table->string('kota_tujuan')->nullable();;
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
        Schema::dropIfExists('pemantauan_covids');
    }
}
