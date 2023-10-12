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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();

            $table->string('name_english');
            $table->string('name_bengali')->nullable();
            $table->string('name_hindi')->nullable();
            $table->string('image')->nullable();
            $table->string('description_english')->nullable();
            $table->string('description_hindi')->nullable();
            $table->string('description_bengali')->nullable();

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
        Schema::dropIfExists('authors');
    }
};
