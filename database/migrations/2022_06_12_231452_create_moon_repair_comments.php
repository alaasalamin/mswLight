<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoonRepairComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moon_repair_comments', function (Blueprint $table) {
            $table->id();
            $table->string("writter");
            $table->string("comment");
            $table->integer("deviceId");
            $table->string('status')->default("readable");
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
        Schema::dropIfExists('moon_repair_comments');
    }
}
