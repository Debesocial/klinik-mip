<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcuLanjutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mcu_lanjutans');
        Schema::create('mcu_lanjutans', function (Blueprint $table) {
            $table->id();
            $table->string('id_mcu_lanjutan');
            $table->string('jenis_mcu');
            $table->foreignId('pasien_id')->constrained();
            $table->string('deskripsi_hasil');
            $table->string('deskripsi_obat');
            $table->string('tanggal_pemeriksaan');
            $table->string('rekomendasi');
            $table->string('jenis_pemeriksaan')->nullable();
            $table->string('status');
            $table->integer('id_jenis_vendor_mcu');
            $table->string('others_jenis_vendor_mcu')->nullable();
            $table->string('nama_vendor_mcu');
            $table->json('dokumen')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcu_lanjutans');
    }
}
