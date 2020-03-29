<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classstudents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('classroom_id')->unsigned()->index();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('classstudents', function($table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });

        Schema::table('classstudents', function($table) {
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
        Schema::dropIfExists('classstudents');
    }
}
