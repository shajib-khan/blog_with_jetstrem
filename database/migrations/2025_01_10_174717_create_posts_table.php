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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('cover_image')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->text('meta_description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(0);

            $table->foreignId('author_id')->constrained('users');

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
