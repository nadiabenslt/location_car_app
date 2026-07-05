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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('car_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('pickup_date');
            $table->date('return_date');

            $table->string('pickup_location');
            $table->string('return_location');

            $table->unsignedInteger('total_days');

            $table->decimal('daily_price', 10, 2);
            $table->decimal('total_price', 10, 2);

            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Active',
                'Completed',
                'Cancelled',
            ])->default('Pending');

            $table->text('notes')->nullable();

            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
