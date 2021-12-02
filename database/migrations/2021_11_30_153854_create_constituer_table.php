<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstituerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituer', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10)->nullable();
            $table->string('CMP_CODE', 4)->nullable();
            $table->float('CST_QTE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constituer');
    }
}
