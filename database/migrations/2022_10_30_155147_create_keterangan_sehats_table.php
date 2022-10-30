<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganSehatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_sehats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->string('anamnesis');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('suhu_tubuh');
            $table->string('tekanan_darah');
            $table->string('denyut_nadi');
            $table->string('laju_pernapasan');
            $table->string('saturasi');
            $table->string('status');
            $table->boolean('hasil');
            $table->text('ttd');
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
        Schema::dropIfExists('keterangan_sehats');
    }
}
