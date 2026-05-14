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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('status')->unsigned()->nullable();
            $table->unsignedInteger('chutro_id');
            $table->foreign('chutro_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category_rooms')->onDelete('set null');
            $table->string("main_img")->nullable();
            $table->json('list_img')->nullable();
            $table->string("video_link")->nullable();
            $table->integer('price');
            $table->integer('electric');
            $table->integer('water');
            $table->integer('area');
            $table->text('describe_room');
            $table->string('unit');
            $table->integer('quantity');
            $table->json('add_ons')->nullable();
            $table->string('detail_address')->nullable();
            $table->json('latlng')->nullable();
            $table->string('ward_id', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
