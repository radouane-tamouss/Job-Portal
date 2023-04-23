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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('person_name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('token')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('company_size')->nullable();
            $table->integer('industry_id')->nullable();
            $table->string('founded_on')->nullable();
            $table->string('description')->nullable();
            $table->string('oh_monday')->nullable(); // Opening Hours for monday to sunday
            $table->string('oh_tuesday')->nullable();
            $table->string('oh_wednesday')->nullable();
            $table->string('oh_thursday')->nullable();
            $table->string('oh_friday')->nullable();
            $table->string('oh_saturday')->nullable();
            $table->string('oh_sunday')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('map_code')->nullable();
            $table->tinyInteger('status');

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
        Schema::dropIfExists('companies');
    }
};
