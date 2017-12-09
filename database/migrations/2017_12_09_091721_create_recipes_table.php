<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('box_type');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_title')->nullable();
            $table->text('marketing_description');
            $table->unsignedInteger('calories_kcal');
            $table->unsignedInteger('protein_grams');
            $table->unsignedInteger('fat_grams');
            $table->unsignedInteger('carbs_grams');
            $table->string('bulletpoint1')->nullable();
            $table->string('bulletpoint2')->nullable();
            $table->string('bulletpoint3')->nullable();
            $table->string('recipe_diet_type_id');
            $table->string('season');
            $table->string('base')->nullable();
            $table->string('protein_source');
            $table->unsignedInteger('preparation_time_minutes');
            $table->unsignedInteger('shelf_life_days');
            $table->string('equipment_needed');
            $table->string('origin_country');
            $table->string('recipe_cuisine');
            $table->text('in_your_box')->nullable();
            $table->unsignedInteger('gousto_reference');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
