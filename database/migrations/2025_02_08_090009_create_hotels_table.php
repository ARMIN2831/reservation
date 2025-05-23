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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('mobile')->unique()->nullable();
            $table->string('star')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('mapAddress')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('password')->nullable();
            $table->string('cart')->nullable();
            $table->string('cartOwner')->nullable();
            $table->integer('profit')->nullable();
            $table->timestamps();
        });
        Schema::create('hotel_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->string('role');
            $table->timestamps();
        });
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->text('icon')->nullable();
            $table->timestamps();
        });
        Schema::create('hotel_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->foreignId('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('hotel_users');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('hotel_facilities');
    }
};
