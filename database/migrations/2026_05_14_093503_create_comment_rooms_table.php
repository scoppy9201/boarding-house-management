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
        Schema::create('comment_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rooms_id');
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('CASCADE');
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
        Schema::dropIfExists('comment_rooms');
    }
};
