<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcuAwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('mcu_awals', function (Blueprint $table) {
            $table->id();
            $table->string('id_mcu_awal');
            $table->foreignId('pasien_id')->constrained();
            $table->foreignId('hasil_rekomendasi');
            $table->text('anjuran');
            $table->string('dokumen')->nullable();
            $table->integer('id_jenis_vendor_mcu');
            $table->string('others_jenis_vendor_mcu')->nullable();
            $table->string('nama_vendor_mcu');
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
        Schema::dropIfExists('mcu_awals');
    }
}
