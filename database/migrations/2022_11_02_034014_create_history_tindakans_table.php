<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTindakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_tindakans', function (Blueprint $table) {
            $table->id();
            $table->string('id_doc');
            $table->foreignId('rekam_medis_id')->constrained();
            $table->foreignId('tindakan_id')->constrained();
            $table->string('alkes');
            $table->string('jumlah_pengguna');
            $table->string('keterangan');
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
        Schema::dropIfExists('history_tindakans');
    }
}
