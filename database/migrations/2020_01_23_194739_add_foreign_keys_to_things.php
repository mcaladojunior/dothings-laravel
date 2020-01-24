<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToThings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('things')) {
    
            Schema::enableForeignKeyConstraints();
            
            Schema::table('things', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

                $table->unsignedBigInteger('thing_id')->nullable();
                $table->foreign('thing_id')
                    ->references('id')
                    ->on('things')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('things')) {
            
            Schema::enableForeignKeyConstraints();
            
            Schema::table('things', function (Blueprint $table) {
                $table->dropForeign('things_thing_id_foreign');
                $table->dropColumn('thing_id');

                $table->dropForeign('things_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
    }
}
