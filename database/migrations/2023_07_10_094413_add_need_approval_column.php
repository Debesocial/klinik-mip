<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNeedApprovalColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function(Blueprint $table){
            
            $table->boolean('need_approve_resep')->default(0);
            $table->boolean('is_approved')->default(0);
        });
        Schema::table('rawat_jalans', function(Blueprint $table){
            
            $table->boolean('need_approve_resep')->default(0);
            $table->boolean('is_approved')->default(0);
            
        });
        Schema::table('instruksi_dokters', function(Blueprint $table){
            
            $table->boolean('need_approve_resep')->default(0);
            $table->boolean('is_approved')->default(0);
            
        });
        Schema::table('tanda_vitals', function(Blueprint $table){
            
            $table->boolean('need_approve_resep')->default(0);
            $table->boolean('is_approved')->default(0);
            
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
