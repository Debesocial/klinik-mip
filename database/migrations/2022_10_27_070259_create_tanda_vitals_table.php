<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTandaVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tanda_vitals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rawat_inap');
            $table->foreign('id_rawat_inap')->references('id')->on('rawat_inaps');
            $table->string('skala_nyeri');
            $table->string('hr');
            $table->string('bp');
            $table->string('temp');
            $table->string('rr');
            $table->string('saturasi_oksigen');
            $table->string('keterangan')->nullable();
            $table->text('dokumen')->nullable();
            $table->json('terapi');
            $table->unsignedBigInteger('gejala');
            $table->foreign('gejala')->references('id')->on('hasil_pemantauans');
            $table->text('gejala_lain')->nullable();
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
        Schema::dropIfExists('tanda_vitals');
    }
}
