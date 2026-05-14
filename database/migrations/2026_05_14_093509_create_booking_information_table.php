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
        Schema::create('booking_information', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rooms_id');
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('CASCADE');
            $table->text('message');
            $table->string('email')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_information');
    }
};
