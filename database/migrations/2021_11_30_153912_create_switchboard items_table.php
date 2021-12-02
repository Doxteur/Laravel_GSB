<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchboardItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switchboard items', function (Blueprint $table) {
            $table->integer('SwitchboardID')->nullable();
            $table->smallInteger('ItemNumber')->nullable();
            $table->string('ItemText')->nullable();
            $table->smallInteger('Command')->nullable();
            $table->string('Argument')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('switchboard items');
    }
}
