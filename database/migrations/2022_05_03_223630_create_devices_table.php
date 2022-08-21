<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->integer("business");
            $table->string('brand');
            $table->string('model');
            $table->string('error');
            $table->string('description')->nullable();
            $table->string('deviceStatus');
            $table->string('pinCode')->nullable();
            $table->string('simCode')->nullable();
            $table->string('accessories')->nullable();
            $table->boolean('dataRecovery')->default('0');
            $table->string('imei')->nullable();
            $table->integer('price')->default('19');
            $table->string('status')->default('open');
            $table->string('tech')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
