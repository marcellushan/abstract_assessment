<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReassessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reassessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessor_id');
            $table->integer('team_id');
            $table->integer('goal_id');
            $table->string('course');
            $table->integer('slo_id');
            $table->text('method');
            $table->text('measure');
            $table->string('floyd');
            $table->string('cartersville');
            $table->string('marietta');
            $table->string('paulding');
            $table->string('heritage');
            $table->string('douglasville');
            $table->string('elearning');
            $table->text('data_summary');
            $table->text('recommended_actions');
            $table->integer('results');
            $table->date('submit_date');
            $table->date('complete_date');
            $table->integer('associated_assessment')->nullable();
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
        Schema::dropIfExists('reassessments');
    }
}
