<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRestaurantTable extends Migration
{
    public function up()
    {
        Schema::create('meal_restaurant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_restaurant');
    }
}
