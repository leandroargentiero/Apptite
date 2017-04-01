<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealAllergensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_allergens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            $table->integer('allergen_id')->unsigned();
            $table->timestamps();
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('allergen_id')->references('id')->on('allergens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_allergens');
    }
}
