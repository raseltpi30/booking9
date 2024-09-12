<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Create a new booking
        $booking = DB::table('bookings')->insert([
            'finalTotal' => $request->input('finalTotal'),
            'totalExtras' => $request->input('totalExtras'),
            'extras' => json_encode($request->input('extras')),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'service' => $request->input('service'),
            'bathroom' => $request->input('bathroom'),
            'frequency' => $request->input('frequency'),
            'typeOfService' => $request->input('typeOfService'),
            'discountPercentage' => $request->input('discountPercentage'),
            'discountAmount' => $request->input('discountAmount'),
        ]);

        // Return a response
        return response()->json(['success' => true, 'message' => 'Booking successfully created!'], 200);
    }
}
