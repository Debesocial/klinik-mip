<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_pasien_id')->constrained();
            $table->string('NIK', 16);
            $table->foreignId('perusahaan_id')->constrained();
            $table->foreignId('divisi_id')->constrained();
            $table->foreignId('jabatan_id')->constrained();
            $table->foreignId('keluarga_id')->constrained();
            $table->string('nama_pasien', 50);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->bigInteger('umur');
            $table->string('jenis_kelamin', 10);
            $table->string('alamat', 50);
            $table->string('alamat_mess', 20);
            $table->string('pekerjaan', 20);
            $table->string('telepon', 20);
            $table->string('email', 30);
            $table->boolean('alergi_obat');
            $table->boolean('hamil_menyusui');
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
        Schema::dropIfExists('pasiens');
    }
}
