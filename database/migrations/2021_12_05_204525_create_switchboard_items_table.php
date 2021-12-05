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
        Schema::create('switchboard_items', function (Blueprint $table) {
            $table->integer('SwitchboardID');
            $table->smallInteger('ItemNumber');
            $table->string('ItemText')->nullable();
            $table->smallInteger('Command')->nullable();
            $table->string('Argument')->nullable();

            $table->primary(['SwitchboardID', 'ItemNumber']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('switchboard_items');
    }
}
