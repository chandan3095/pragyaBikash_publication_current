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
        Schema::create('language_mappers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('language_type_id')->nullable();
            $table->foreign('language_type_id')->references('id')->on('language_types');

            $table->string('table_name');
            $table->string('column_name');
            $table->string('value');

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
        Schema::dropIfExists('language_mappers');
    }
};
