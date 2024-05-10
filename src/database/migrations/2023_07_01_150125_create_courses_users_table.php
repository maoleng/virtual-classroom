<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses_users', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->double('price');
            $table->primary(['user_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_users');
    }
};
