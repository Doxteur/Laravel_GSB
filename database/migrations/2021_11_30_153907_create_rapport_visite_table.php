<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportVisiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_visite', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10)->nullable();
            $table->integer('RAP_NUM')->nullable();
            $table->smallInteger('PRA_NUM')->nullable()->index('PRA_NUM');
            $table->dateTime('RAP_DATE')->nullable();
            $table->string('RAP_BILAN')->nullable();
            $table->string('RAP_MOTIF')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport_visite');
    }
}
