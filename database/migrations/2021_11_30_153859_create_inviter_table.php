<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inviter', function (Blueprint $table) {
            $table->integer('AC_NUM')->nullable();
            $table->smallInteger('PRA_NUM')->nullable();
            $table->bit('SPECIALISTEON', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inviter');
    }
}
