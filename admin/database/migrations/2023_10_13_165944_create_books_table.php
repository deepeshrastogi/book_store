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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title',80);
            $table->string('author',40);
            $table->string('genre',20);
            $table->string('isbn',20);
            $table->string('image');
            $table->date('published');
            $table->string('publisher',40);
            $table->text('description')->nullable();
            $table->tinyInteger('active')->default('1')->comment('0=inactive, 1=active')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
