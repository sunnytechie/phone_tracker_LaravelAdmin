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
        Schema::create('phone_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('accuracy', 10, 2)->nullable();
            $table->decimal('altitude', 10, 2)->nullable();
            $table->decimal('altitude_accuracy', 10, 2)->nullable();
            $table->decimal('heading', 10, 2)->nullable();
            $table->decimal('speed', 10, 2)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_locations');
    }
};
