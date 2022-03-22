<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTempToLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->integer('Temp')->comment('Temperatura powietrza z czujnika DHT11.');
            $table->integer('Hum')->comment('Wilgotnosc powietrza z czujnika DHT11.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            //
        });
    }
}
