<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessor_id');
            $table->integer('period');
            $table->integer('slo_id');
            $table->integer('goal_id');
            $table->integer('team_id');
            $table->integer('course_id');
            $table->text('method');
            $table->text('measure');
            $table->boolean('submitted')->nullable();
            $table->date('submit_date')->nullable();
            $table->boolean('inactive')->nullable();
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
        Schema::dropIfExists('assessments');
    }
}
