<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergens', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('gluten')->default(false);
            $table->boolean('ei')->default(false);
            $table->boolean('vis')->default(false);
            $table->boolean('melk')->default(false);
            $table->boolean('schaaldieren')->default(false);
            $table->boolean('peulvruchten')->default(false);
            $table->boolean('tomaat')->default(false);
            $table->boolean('soja')->default(false);
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
        Schema::dropIfExists('allergens');
    }
}
