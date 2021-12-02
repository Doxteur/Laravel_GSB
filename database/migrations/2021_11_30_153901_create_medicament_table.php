<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicament', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10)->nullable();
            $table->string('MED_NOMCOMMERCIAL', 25)->nullable();
            $table->string('FAM_CODE', 3)->nullable();
            $table->string('MED_COMPOSITION')->nullable();
            $table->string('MED_EFFETS')->nullable();
            $table->string('MED_CONTREINDIC')->nullable();
            $table->float('MED_PRIXECHANTILLON')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament');
    }
}
