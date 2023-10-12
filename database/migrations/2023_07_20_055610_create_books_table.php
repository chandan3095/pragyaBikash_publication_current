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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

            $table->string('english_name');
            $table->string('bengali_name')->nullable();
            $table->string('hindi_name')->nullable();
            $table->string('slug')->unique();
            $table->longText('description_english')->nullable();
            $table->longText('description_bengali')->nullable();
            $table->longText('description_hindi')->nullable();
            $table->float('cost_price');
            $table->float('sale_price');
            $table->string('isbn_code');
            $table->string('publishing year');
            $table->enum('status',['in_stock','out_of_stock'])->nullable();

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
        Schema::dropIfExists('books');
    }
};
