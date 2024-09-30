<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'street',
        'apt',
        'city',
        'postal_code',
        'service',
        'bathroom',
        'typeOfService',
        'storey',
        'frequency',
        'day',
        'time',
        'extras',
        'discountPercentage',
        'discountAmount',
        'couponDiscountAmount',
        'totalExtras',
        'finalTotal',
        'status',
    ];
}

