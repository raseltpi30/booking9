<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'coupons';

    // Specify which fields are mass assignable
    protected $fillable = [
        'coupon',
        'valid_date',
        'discountPercent',
        'status',
    ];

    // Optionally, you can add casting for fields
    protected $casts = [
        'valid_date' => 'date', // Cast to date type
        'status' => 'boolean',   // Cast to boolean
    ];
}
