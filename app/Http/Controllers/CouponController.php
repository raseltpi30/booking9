<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon; // Assuming your Coupon model is created
use Carbon\Carbon; // Make sure to include Carbon for date handling
use Illuminate\Support\Facades\DB;

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

    public function customCoupon(Request $request)
    {
        // Get tomorrow's date
        $tomorrow = Carbon::tomorrow()->toDateString();

        // Prepare the new coupon data
        $data = [
            'coupon' => $request->coupon,
            'discountPercent' => $request->discountPercent,
            'valid_date' => $tomorrow,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Delete the existing coupon if it exists
        DB::table('coupons')->where('coupon', $request->coupon)->delete();

        // Insert the new coupon
        DB::table('coupons')->insert($data);

        return response()->json([
            'success' => true,
            'message' => 'Coupon created successfully! Your Coupon is "' . $request->coupon . '"!'
        ]);
    }
}
