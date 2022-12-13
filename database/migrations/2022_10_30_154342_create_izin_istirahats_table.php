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
            $table->foreignId('tindakan_id')->constrained();
            $table->string('nama_alat');
            $table->string('jumlah_pengguna');
            $table->string('keterangan');
            $table->string('nama_obat');
            $table->string('jumlah_obat');
            $table->string('aturan');
            $table->string('keterangan_obat');
            $table->boolean('dapat_bekerja')->nullable();
            $table->boolean('istirahat')->nullable();
            $table->date('dari')->nullable();
            $table->date('sampai')->nullable();
            $table->boolean('rujukan')->nullable();
            $table->foreignId('spesialis_rujukan_id')->constrained();
            $table->foreignId('rumah_sakit_rujukan_id')->constrained();
            $table->text('ttd')->nullable();
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
