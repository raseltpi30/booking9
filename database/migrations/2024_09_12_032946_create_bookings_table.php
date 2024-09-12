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
            $table->string('service')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('frequency')->nullable();
            $table->string('typeOfService')->nullable();
            $table->decimal('finalTotal', 10, 2)->nullable();
            $table->decimal('totalExtras', 10, 2)->nullable();
            $table->text('extras')->nullable();
            $table->decimal('discountPercentage', 5, 2)->nullable(); // Discount percentage
            $table->decimal('discountAmount', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
