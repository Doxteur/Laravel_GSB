<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteComplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_compl', function (Blueprint $table) {
            $table->integer('AC_NUM')->primary();
            $table->dateTime('AC_DATE')->nullable();
            $table->string('AC_LIEU', 25)->nullable();
            $table->string('AC_THEME', 10)->nullable();
            $table->string('AC_MOTIF', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activite_compl');
    }
}
