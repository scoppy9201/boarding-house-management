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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category_news')->onDelete('set null');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->longText('content');
            $table->text('short_content', 200);
            $table->string('thumbnail');
            $table->json('key_words');
            $table->integer('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
