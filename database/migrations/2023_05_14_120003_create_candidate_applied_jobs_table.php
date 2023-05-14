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
        Schema::create('candidate_applied_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->integer('job_id');
            $table->text('cover_letter');
            $table->string('status')->default('applied');
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
        Schema::dropIfExists('candidate_applied_jobs');
    }
};
