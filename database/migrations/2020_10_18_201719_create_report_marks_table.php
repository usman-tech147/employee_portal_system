<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->integer('course_detail');
            $table->integer('course_assessment');
            $table->integer('new_course');
            $table->integer('thesis_supervise');
            $table->integer('project_supervise');
            $table->integer('workshop_terminal');
            $table->integer('batch_advise');
            $table->integer('travel_and_research');
            $table->integer('committee');
            $table->integer('comment_marks');
            $table->integer('total_marks');
            $table->char('grades');
            $table->tinyInteger('hr_marks')->default('0');
            $table->tinyInteger('dean_marks')->default('0');
            $table->string('year');
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
        Schema::dropIfExists('report_marks');
    }
}
