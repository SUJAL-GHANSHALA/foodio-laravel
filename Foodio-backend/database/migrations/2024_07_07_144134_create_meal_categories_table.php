<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('meal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // starters, drinks, etc.
            $table->timestamps();
        });

        // Update meals table to include foreign key for meal category
        Schema::table('meals', function (Blueprint $table) {
            $table->foreignId('meal_category_id')->constrained('meal_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Rollback the addition of foreign key in meals table
        Schema::table('meals', function (Blueprint $table) {
            $table->dropForeign(['meal_category_id']);
            $table->dropColumn('meal_category_id');
        });

        Schema::dropIfExists('meal_categories');
    }
}
