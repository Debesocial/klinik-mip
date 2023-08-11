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
            $table->string('id_rekam_medis')->nullable();
            $table->foreignId('kategori_pasien_id')->nullable()->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->string('NIK', 16)->nullable();
            $table->string('penduduk')->nullable();
            $table->foreignId('perusahaan_id')->nullable()->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('divisi_id')->nullable()->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->string('divisi_lain')->nullable();
            $table->foreignId('jabatan_id')->nullable()->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->string('jabatan_lain')->nullable();
            $table->foreignId('keluarga_id')->nullable()->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->string('lain')->nullable();
            $table->string('nama_pasien', 50);
            $table->string('tempat_lahir', 20)->nullable();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 10)->nullable();
            $table->text('alamat')->nullable();
            $table->text('alamat_mess')->nullable();
            $table->string('pekerjaan', 20)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('email', 30)->nullable();
            $table->boolean('alergi_obat')->nullable();
            $table->json('alergi')->nullable();
            $table->boolean('hamil_menyusui');
            $table->text('upload')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
            $table->boolean('is_sap')->default(0);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pasiens');
        Schema::enableForeignKeyConstraints();
    }
}
