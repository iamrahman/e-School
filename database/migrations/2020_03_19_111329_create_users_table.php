<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('dob');
            $table->string('phone');
            $table->enum('role',['teacher','parent','accountant','admin']);
            $table->enum('status', ['active', 'pending', 'inactive']);
            $table->string('last_login');
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
        Schema::dropIfExists('users');
    }
}
