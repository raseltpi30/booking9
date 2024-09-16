<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentDetailsMail;


class BookingController extends Controller
{
    // public function store(Request $request)
    // {
    //     $data = [
    //         'firstName'            => $request->input('firstName', null),
    //         'lastName'             => $request->input('lastName', null),
    //         'email'                => $request->input('email', null),
    //         'phone'                => $request->input('phone', null),
    //         'street'               => $request->input('street', null),
    //         'apt'                  => $request->input('apt', null),
    //         'city'                 => $request->input('city', null),
    //         'postalCode'           => $request->input('postalCode', null),
    //         'service'              => $request->input('service', null),
    //         'bathroom'             => $request->input('bathroom', null),
    //         'typeOfService'        => $request->input('typeOfService', null),
    //         'storey'               => $request->input('storey', null),
    //         'frequency'            => $request->input('frequency', null),
    //         'day'                  => $request->input('day', null),
    //         'time'                 => $request->input('time', null),
    //         'discountPercentage'   => $request->input('discountPercentage', 0),
    //         'discountAmount'       => $request->input('discountAmount', 0),
    //         'couponDiscountAmount' => $request->input('couponDiscountAmount', 0),
    //         'extras'               => $request->input('extras', []),
    //         'totalExtras'          => $request->input('totalExtras', 0),
    //         'finalTotal'           => $request->input('finalTotal', 0),
    //     ];

    //     // Send the email
    //     Mail::to($request->email)->send(new PaymentDetailsMail($data));

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Payment details sent successfully.',
    //     ], 200);
    // }
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $data = $request->all();
        try {
            // $firstName = $data['firstName'] ?? null;
            // $lastName = $data['lastName'] ?? null;
            // $email = $data['email'] ?? null;
            // $phone = $data['phone'] ?? null;
            // $street = $data['street'] ?? null;
            // $apt = $data['apt'] ?? null;
            // $city = $data['city'] ?? null;
            // $postalCode = $data['postalCode'] ?? null;
            // $service = $data['service'] ?? null;
            // $bathroom = $data['bathroom'] ?? null;
            // $typeOfService = $data['typeOfService'] ?? null;
            // $storey = $data['storey'] ?? null;
            // $frequency = $data['frequency'] ?? null;
            // $day = $data['day'] ?? null;
            // $time = $data['time'] ?? null;
            // $discountPercentage = $data['discountPercentage'] ?? 0;
            // $discountAmount = $data['discountAmount'] ?? 0;
            // $couponDiscountAmount = $data['couponDiscountAmount'] ?? 0;
            // $extras = $data['extras'] ?? [];
            // $totalExtras = $data['totalExtras'] ?? 0;
            // $finalTotal = $data['finalTotal'] ?? 0;


            // $bookingId = DB::table('bookings')->insertGetId([
            //     'firstName' => $firstName,
            //     'lastName' => $lastName,
            //     'email' => $email,
            //     'phone' => $phone,
            //     'street' => $street,
            //     'apt' => $apt,
            //     'city' => $city,
            //     'postal_code' => $postalCode,
            //     'service' => $service,
            //     'bathroom' => $bathroom,
            //     'typeOfService' => $typeOfService,
            //     'storey' => $storey,
            //     'frequency' => $frequency,
            //     'day' => $day,
            //     'time' => $time,
            //     'discountPercentage' => $discountPercentage,
            //     'discountAmount' => $discountAmount,
            //     'couponDiscountAmount' => $couponDiscountAmount,
            //     'extras' => json_encode($extras),
            //     'totalExtras' => $totalExtras,
            //     'finalTotal' => $finalTotal,
            //     'stripe_checkout_session_id' => $data['stripeToken'], // Store Stripe session ID
            //     'status' => 'completed', // Initial status
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            $charge = Charge::create([
                'amount' => $data['finalTotal'] * 100, // Convert to cents
                'currency' => 'usd',
                'source' => $data['stripeToken'],
                'description' => 'Payment for service', // Adjust description as needed
                'metadata' => [
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'street' => $data['street'],
                    'apt' => $data['apt'],
                    'city' => $data['city'],
                    'postalCode' => $data['postalCode'],
                    'service' => $data['service'],
                    'bathroom' => $data['bathroom'],
                    'typeOfService' => $data['typeOfService'],
                    'storey' => $data['storey'],
                    'frequency' => $data['frequency'],
                    'day' => $data['day'],
                    'time' => $data['time'],
                    'discountPercentage' => $data['discountPercentage'] ?? null,
                    'discountAmount' => $data['discountAmount'] ?? null,
                    'couponDiscountAmount' => $data['couponDiscountAmount'] ?? null,
                    'extras' => json_encode($data['extras'] ?? null),
                    'totalExtras' => $data['totalExtras'] ?? null,
                    'finalTotal' => $data['finalTotal'],
                ]
            ]);

            return response()->json(['success' => true, 'charge' => $charge]);
            return 1;
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
        // $data = [
        //     'firstName'            => $request->input('firstName', null),
        //     'lastName'             => $request->input('lastName', null),
        //     'email'                => $request->input('email', null),
        //     'phone'                => $request->input('phone', null),
        //     'street'               => $request->input('street', null),
        //     'apt'                  => $request->input('apt', null),
        //     'city'                 => $request->input('city', null),
        //     'postalCode'           => $request->input('postalCode', null),
        //     'service'              => $request->input('service', null),
        //     'bathroom'             => $request->input('bathroom', null),
        //     'typeOfService'        => $request->input('typeOfService', null),
        //     'storey'               => $request->input('storey', null),
        //     'frequency'            => $request->input('frequency', null),
        //     'day'                  => $request->input('day', null),
        //     'time'                 => $request->input('time', null),
        //     'discountPercentage'   => $request->input('discountPercentage', 0),
        //     'discountAmount'       => $request->input('discountAmount', 0),
        //     'couponDiscountAmount' => $request->input('couponDiscountAmount', 0),
        //     'extras'               => $request->input('extras', []),
        //     'totalExtras'          => $request->input('totalExtras', 0),
        //     'finalTotal'           => $request->input('finalTotal', 0),
        // ];

        // // Send the email
        // Mail::to($request->email)->send(new PaymentDetailsMail($data));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Payment details sent successfully.',
        // ], 200);
    }

    public function success(Request $request)
    {
        $sessionId = $request->session_id;
        // return $sessionId;
        if (!$sessionId) {
            return $request->all();
        }

        // Stripe client setup
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        try {
            // Retrieve the Stripe session
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            // Check if the session is completed
            if ($session->payment_status === 'paid') {
                // Retrieve booking from the database
                $booking = DB::table('bookings')
                    ->where('stripe_checkout_session_id', $sessionId)
                    ->first();

                if ($booking) {
                    // Update booking status to 'completed'
                    DB::table('bookings')
                        ->where('stripe_checkout_session_id', $sessionId)
                        ->update([
                            'status' => 'completed',
                            'updated_at' => now()
                        ]);
                }

                return 'success';
            }

            return 'cancel';
        } catch (\Exception $e) {
            // Handle exceptions
            return 'cancel1';
        }
    }

    public function cancel(Request $request)
    {
        $sessionId = $request->session_id;
        $booking = DB::table('bookings')
            ->where('stripe_checkout_session_id', $sessionId)
            ->first();

        if ($booking) {
            // Update booking status to 'completed'
            DB::table('bookings')
                ->where('stripe_checkout_session_id', $sessionId)
                ->update([
                    'status' => 'canceled',
                    'updated_at' => now()
                ]);
        }
        return redirect()->route('payment.canceled');
    }
    public function paymentSuccess()
    {
        return view('payment.success');
    }
    public function paymentCanceled()
    {
        return view('payment.cancel');
    }
}
