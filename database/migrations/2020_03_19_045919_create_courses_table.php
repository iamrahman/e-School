<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('status', ['active', 'pending', 'inactive']);
            $table->bigInteger('classroom_id')->unsigned()->index();
            $table->bigInteger('teacher_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('courses', function($table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
        Schema::table('courses', function($table) {
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
