<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObatAntibiotik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->boolean('is_antibiotik')->default(0);
            $table->boolean('is_sedatif')->default(0); //efek sedatif
            $table->text('sediaan')->nullable();
            $table->string('distributor')->nullable();
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
