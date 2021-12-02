<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealiserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realiser', function (Blueprint $table) {
            $table->integer('AC_NUM')->nullable();
            $table->string('VIS_MATRICULE', 10)->nullable();
            $table->float('REA_MTTFRAIS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realiser');
    }
}
