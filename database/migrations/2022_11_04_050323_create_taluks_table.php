<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaluksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taluks', function (Blueprint $table) {
            $table->id();
            $table->string("zoneid");
            $table->string("areaname");
            $table->string("areacode");
            $table->string("talukname")->unique();
            $table->string("talukcode");
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
        Schema::dropIfExists('taluks');
    }
}
