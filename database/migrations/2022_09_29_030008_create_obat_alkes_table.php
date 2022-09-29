<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatAlkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_alkes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_obat_id')->constrained();
            $table->foreignId('golongan_obat_id')->constrained();
            $table->foreignId('nama_obat_id')->constrained();
            $table->foreignId('satuan_obat_id')->constrained();
            $table->foreignId('bobot_obat_id')->constrained();
            $table->string('komposisi_obat');
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
        Schema::dropIfExists('obat_alkes');
    }
}
