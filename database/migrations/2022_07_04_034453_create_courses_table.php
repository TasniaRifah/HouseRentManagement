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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->nullable();
            $table->string('batch_no')->unique()->nullable();
            $table->date('class_start_date')->nullable();
            $table->date('class_end_date')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('baner')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('course_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
};
