<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableResepAndObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->json('resep')->default('[]')->nullable()->change();
            $table->json('tindakan')->default('[]')->nullable()->change();
            $table->dropColumn(['denyut_nadi_menit','laju_pernapasan_menit']);

        });
        Schema::table('rawat_jalans', function (Blueprint $table) {
            $table->json('resep')->default('[]')->nullable()->change();
            $table->json('tindakan')->default('[]')->nullable()->change();
            $table->dropColumn(['denyut_nadi_menit','laju_pernapasan_menit']);
        });
        Schema::table('kecelakaan_kerjas', function (Blueprint $table) {
            $table->json('resep')->default('[]')->nullable()->change();
            $table->json('tindakan')->default('[]')->nullable()->change();
            $table->dropColumn(['denyut_nadi_menit','laju_pernapasan_menit']);

        });
        Schema::table('izin_istirahats', function (Blueprint $table) {
            $table->json('terapi')->default('[]')->nullable()->change();
            $table->json('tindakan')->default('[]')->nullable()->change();
            
        });
        Schema::table('intervensi_keperawatans', function (Blueprint $table) {
            $table->json('tindakan')->default('[]')->nullable()->change();
            $table->dropColumn(['denyut_nadi_menit','laju_pernapasan_menit']);

        });
        Schema::table('instruksi_dokters', function (Blueprint $table) {
            $table->json('tindakan')->default('[]')->nullable()->change();
            $table->json('resep_obat')->default('[]')->nullable()->change();
            $table->dropColumn(['denyut_nadi_menit','laju_pernapasan_menit']);


        });
        Schema::table('permintaan_makanans', function (Blueprint $table) {
            if (!Schema::hasColumn('permintaan_makanans','jumlah_pemberian')) {
                $table->integer('jumlah_pemberian')->nullable();
            }

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
