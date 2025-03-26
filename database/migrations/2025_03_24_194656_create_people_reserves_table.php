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
        Schema::create('people_reserves', function (Blueprint $table) {
            $table->id();
            $table->string('reserve_id')->nullable();
            $table->string('sex')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('nationalCode')->nullable();
            $table->string('mobile')->nullable();
            $table->morphs('model');
            $table->integer('model_number')->nullable();
            $table->integer('people_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_reserves');
    }
};
