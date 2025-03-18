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
        Schema::create('room_options', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('bord')->nullable();
            $table->string('ajax')->nullable();
            $table->string('capacity')->nullable();
            $table->string('entry')->nullable();
            $table->string('exit')->nullable();
            $table->string('status')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_options');
    }
};
