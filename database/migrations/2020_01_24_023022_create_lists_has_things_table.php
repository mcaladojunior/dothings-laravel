<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsHasThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('lists_has_things', function (Blueprint $table) {
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')
                    ->references('id')
                    ->on('lists')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('thing_id');
            $table->foreign('thing_id')
                    ->references('id')
                    ->on('things')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->primary(['list_id', 'thing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists_has_things');
    }
}
