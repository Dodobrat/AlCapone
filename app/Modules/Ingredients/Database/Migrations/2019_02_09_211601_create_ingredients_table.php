<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });

        Schema::create('ingredients_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->unique([
                'ingredient_id',
                'locale',
            ]);

            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('ingredients');
        Schema::drop('ingredients_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
