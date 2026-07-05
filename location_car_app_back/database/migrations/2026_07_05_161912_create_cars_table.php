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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->string('color');
            $table->string('license_plate')->unique();
            $table->string('vin')->unique()->nullable();

            $table->enum('fuel_type', [
                'Petrol',
                'Diesel',
                'Hybrid',
                'Electric',
            ]);

            $table->enum('transmission', [
                'Manual',
                'Automatic',
            ]);

            $table->unsignedTinyInteger('seats');
            $table->unsignedTinyInteger('doors');

            $table->decimal('daily_price', 10, 2);

            $table->unsignedInteger('mileage')->default(0);

            $table->enum('status', [
                'Available',
                'Reserved',
                'Maintenance',
                'Out of Service',
            ])->default('Available');

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
