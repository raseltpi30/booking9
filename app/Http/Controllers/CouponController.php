<?php

namespace App\Http\Controllers;

use App\Models\Coupon; // Ensure you import the Coupon model
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function checkCoupon(Request $request)
    {

        // return $request->all();
        // Validate the incoming request
        $request->validate([
            'code' => 'required|string|max:255',
        ]);

        // Get the coupon code from the request

        // Check if the coupon exists in the database
        $coupon = Coupon::where('coupon', $request->code)->first();
        if ($coupon) {
            // If found, return a success response with the discount
            return response()->json([
                'valid' => true,
                'discount' => $coupon->discountPercent , // Assuming there is a discount column
            ]);
        }

        // If not found, return an invalid response
        return response()->json(['valid' => false]);
    }
}
