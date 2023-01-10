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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('dev_lang');
            $table->string('framework')->nullable();
            $table->unsignedTinyInteger('difficulty')->nullable();
            $table->text('team')->nullable();
            $table->string('git_link')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
