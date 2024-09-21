<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon; // Assuming your Coupon model is created
use Carbon\Carbon; // Make sure to include Carbon for date handling

class CouponController extends Controller
{
    /**
     * Apply a coupon code and return the discount percentage.
     */
    public function checkCoupon(Request $request)
    {
        $couponCode = $request->input('couponCode');  // Get the coupon code from the request

        // Find the coupon in the database
        $coupon = Coupon::where('coupon', $couponCode)->first();

        if ($coupon) {
            // Check if the coupon date is expired
            if (Carbon::parse($coupon->valid_date)->isPast()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon date is expired!'
                ]);
            }

            // Check if the coupon is inactive
            if ($coupon->status == 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon is inactive!'
                ]);
            }

            // If the coupon is valid, return success and the discount percentage
            return response()->json([
                'success' => true,
                'discount_percent' => $coupon->discountPercent, // Assuming discount is stored as a percentage
                'message' => 'Coupon Applied Successfully!',
            ]);
        } else {
            // If the coupon does not exist, return an error message
            return response()->json([
                'success' => false,
                'message' => 'Invalid coupon code!'  // You can customize this message as needed
            ]);
        }
    }
}
