<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescrireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescrire', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10)->nullable();
            $table->string('TIN_CODE', 5)->nullable();
            $table->string('DOS_CODE', 10)->nullable();
            $table->string('PRE_POSOLOGIE', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescrire');
    }
}
