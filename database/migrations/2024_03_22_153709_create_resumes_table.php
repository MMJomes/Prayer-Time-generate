<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('line')->nullable();
            $table->string('gender')->nullable();
            $table->longText('address')->nullable();
            $table->longText('nationality')->nullable();
            $table->string('language')->nullable();
            $table->longText('description')->nullable();
            $table->string('school')->nullable();
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->string('gpa')->nullable();
            $table->string('hobby')->nullable();
            $table->string('finish_date')->nullable();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->longText('worked_address')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('resumes');
    }
}
