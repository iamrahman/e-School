<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examresults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned()->index();
            $table->bigInteger('exam_id')->unsigned()->index();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('marks');
            $table->timestamps();
        });
        Schema::table('examresults', function($table) {
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('examresults', function($table) {
            $table->foreign('exam_id')->references('id')->on('examresults');
        });
        Schema::table('examresults', function($table) {
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examresults');
    }
}
