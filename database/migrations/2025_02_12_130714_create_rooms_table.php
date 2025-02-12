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
            $table->id();
            $table->foreignId('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->string('title');
            $table->integer('single');
            $table->integer('double');
            $table->text('description');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('room_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreignId('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('room_facilities');
    }
};
