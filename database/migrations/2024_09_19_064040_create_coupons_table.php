<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('coupon'); // Coupon code
            $table->date('valid_date'); // Validity date
            $table->integer('discountPercent'); // Validity date
            $table->boolean('status')->default(true); // Status of the coupon (active/inactive)
            $table->timestamps(); // Created_at and Updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
