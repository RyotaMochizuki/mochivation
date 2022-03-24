<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('goal_id');
            $table->string('goal_content',100);
           $table->boolean('goal_flg')->default(false); 
            $table->tinyInteger('month');
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
        Schema::dropIfExists('goal_content');
    }
}
