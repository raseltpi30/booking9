<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('apt')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('service')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('typeOfService')->nullable();
            $table->string('storey')->nullable();
            $table->string('frequency')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->text('extras')->nullable(); // Changed to text for JSON data
            $table->integer('discountPercentage')->nullable(); // Discount percentage
            $table->decimal('discountAmount', 10, 2)->nullable()->default(0);
            $table->decimal('couponDiscountAmount', 10, 2)->nullable()->default(0);
            $table->decimal('totalExtras', 10, 2)->nullable()->default(0);
            $table->decimal('finalTotal', 10, 2)->nullable();
            $table->string('stripe_checkout_session_id')->nullable(); // To store Stripe session ID
            $table->string('status')->default('pending'); // Booking status
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
