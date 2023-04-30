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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->integer('company_id');
            $table->text('responsibilities')->nullable();
            $table->text('benifit')->nullable();
            $table->text('skill')->nullable();
            $table->text('education')->nullable();
            $table->text('deadline');
            $table->text('vacancy');
            $table->integer('job_category_id');
            $table->integer('job_location_id');
            $table->integer('job_type_id');
            $table->integer('job_experience_id');
            $table->enum('job_gender', ['male', 'female', 'any'])->default('any');
            $table->integer('job_salary_range_id')->nullable();
            $table->text('map_code')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_urgent')->default(0);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('jobs');
    }
};
