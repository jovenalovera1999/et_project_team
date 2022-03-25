<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('contact');
            $table->string('email');
            $table->string('home_address');
            $table->string('present_address');
            $table->string('school_graduated');
            $table->integer('batch_no');
            $table->string('employment_status');
            $table->string('company_name');
            $table->string('company_location');
            $table->string('job_title');
            $table->string('work_arrangement');
            $table->binary('profile_picture');
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
        Schema::dropIfExists('alumni_records');
    }
};
