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
            $table->id();
            // $table->foreignId('family_group_id')->nullable();          
            $table->foreignId('member_type_id');
            // $table->foreignId('event_id')->nullable();
            // $table->string('gender');
            // $table->timestamp('dob');
            // $table->foreignId('status_id');
            // $table->string('slug');
            $table->string('name');
            $table->string('email');
            // $table->integer('lane')->nullable();
            // $table->string('result')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
