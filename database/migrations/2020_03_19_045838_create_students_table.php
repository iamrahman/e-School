<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable()->default(null);
            $table->string('name');
            $table->string('dob');
            $table->string('phone')->nullable()->default(null);
            $table->string('date_of_join');
            $table->enum('status', ['active', 'pending', 'inactive']);
            $table->bigInteger('parent_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('students', function($table) {
            $table->foreign('parent_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
