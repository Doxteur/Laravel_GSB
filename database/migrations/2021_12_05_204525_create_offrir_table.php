<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffrirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offrir', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10);
            $table->integer('RAP_NUM')->index('RAP_NUM');
            $table->string('MED_DEPOTLEGAL', 10)->index('MED_DEPOTLEGAL');
            $table->smallInteger('OFF_QTE')->nullable();

            $table->primary(['VIS_MATRICULE', 'RAP_NUM', 'MED_DEPOTLEGAL']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offrir');
    }
}
