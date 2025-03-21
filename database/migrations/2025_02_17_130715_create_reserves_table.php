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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('entry_date')->nullable();
            $table->string('exit_date')->nullable();
            $table->string('time')->nullable();
            $table->string('status')->nullable();
            $table->string('paymentStatus')->nullable();
            $table->string('paymentCode')->nullable();
            $table->string('price')->nullable();
            $table->string('card')->nullable();
            $table->string('reserve_by')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreignId('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
