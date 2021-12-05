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
            $table->integer('AC_NUM');
            $table->smallInteger('PRA_NUM');
            $table->boolean('SPECIALISTEON')->nullable();

            $table->primary(['AC_NUM', 'PRA_NUM']);
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
