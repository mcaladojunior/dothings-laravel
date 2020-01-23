<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name', 128);
            $table->text('description');
            $table->smallInteger('status');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->smallInteger('difficulty');
            $table->smallInteger('importance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('things');
    }
}
