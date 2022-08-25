<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoonRepairs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moon_repairs', function (Blueprint $table) {
            $table->id();
            $table->string("brand");
            $table->string("model");
            $table->string("error");
            $table->string("description");
            $table->string("status");
            $table->string("deviceStatus");
            $table->string("imei")->nullable();
            $table->string("pinCode")->nullable();
            $table->string("simCode")->nullable();
            $table->boolean("dataRecovery")->default("0");
            $table->string("tech")->default(NULL);
            $table->string("customerName");
            $table->string("customerEmail");
            $table->string("customerPhoneNumber");
            $table->string("zip");
            $table->string("city");
            $table->string("street");
            $table->string("price");
            $table->string("company")->nullable();
            $table->string("privateNumber")->nullable();

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
        Schema::dropIfExists('moon_repairs');
    }
}
