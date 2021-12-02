<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraticienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praticien', function (Blueprint $table) {
            $table->smallInteger('PRA_NUM')->primary();
            $table->string('PRA_NOM', 25)->nullable();
            $table->string('PRA_PRENOM', 30)->nullable();
            $table->string('PRA_ADRESSE', 50)->nullable();
            $table->string('PRA_CP', 5)->nullable();
            $table->string('PRA_VILLE', 25)->nullable();
            $table->float('PRA_COEFNOTORIETE')->nullable();
            $table->string('TYP_CODE', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praticien');
    }
}
