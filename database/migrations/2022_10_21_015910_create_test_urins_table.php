<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestUrinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_urins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->string('no_surat');
            $table->string('tujuan_surat');
            $table->string('penggunaan_obat')->nullable();
            $table->string('jenis_obat')->nullable();
            $table->string('asal_obat')->nullable();
            $table->string('terakhir_digunakan')->nullable();
            $table->text('dokumen')->nullable();
            $table->boolean('amp');
            $table->boolean('met');
            $table->boolean('thc');
            $table->boolean('bzo');
            $table->boolean('mop');
            $table->boolean('coc');
            $table->boolean('soma');
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
        Schema::dropIfExists('test_urins');
    }
}
