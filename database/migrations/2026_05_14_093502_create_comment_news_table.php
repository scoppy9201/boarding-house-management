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
        Schema::create('comment_news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_id');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('CASCADE');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_news');
    }
};
