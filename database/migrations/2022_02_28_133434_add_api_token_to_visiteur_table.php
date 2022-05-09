<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiTokenToVisiteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visiteur', function (Blueprint $table) {
            //
            $table->string('api_token', 80)->after('LAB_CODE')
                ->unique()
                ->nullable()
                ->default(null);	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visiteur', function (Blueprint $table) {
            //
        });
    }
}
