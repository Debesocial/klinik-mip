<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveredAtColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function(Blueprint $table){
            
            $table->dateTime('delivered_at')->nullable();
            
        });
        Schema::table('rawat_jalans', function(Blueprint $table){
            
            $table->dateTime('delivered_at')->nullable();
            
        });
        Schema::table('instruksi_dokters', function(Blueprint $table){
            
            $table->dateTime('delivered_at')->nullable();
            
        });
        Schema::table('tanda_vitals', function(Blueprint $table){
            
            $table->dateTime('delivered_at')->nullable();
            
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
