<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('isbn', 13)->nullable()->unique();
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
            $table->string('publisher', 100);
            $table->date('publication_date');
            $table->string('genre', 50);
            $table->integer('pages');
            $table->string('language', 20);
            $table->string('cover_url', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('is_available')->default(true);
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
