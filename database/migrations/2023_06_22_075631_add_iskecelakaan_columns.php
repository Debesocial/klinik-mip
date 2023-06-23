<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIskecelakaanColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function(Blueprint $table){
            $table->boolean('is_kecelakaan')->default(0);
        });
        Schema::table('rawat_jalans', function(Blueprint $table){
            $table->boolean('is_kecelakaan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->dropColumn('is_kecelakaan');
        });
        Schema::table('rawat_jalans', function (Blueprint $table) {
            $table->dropColumn('is_kecelakaan');
        });
    }
}
