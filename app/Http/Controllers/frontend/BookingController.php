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


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'finalTotal' => 'required|numeric',
            'stripeToken' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'street' => 'nullable|string',
            'apt' => 'nullable|string',
            'city' => 'nullable|string',
            'postalCode' => 'nullable|string',
            'service' => 'nullable|string',
            'bathroom' => 'nullable|string',
            'typeOfService' => 'nullable|string',
            'storey' => 'nullable|string',
            'frequency' => 'nullable|string',
            'day' => 'nullable|string',
            'time' => 'nullable|string',
            'discountPercentage' => 'nullable|numeric',
            'discountAmount' => 'nullable|numeric',
            'couponDiscountAmount' => 'nullable|numeric',
            'extras' => 'nullable|array',
            'totalExtras' => 'nullable|numeric',
        ]);

        try {
            // Stripe setup
            // Stripe::setApiKey(env('STRIPE_SECRET')); // Use environment variable for API key
            Stripe::setApiKey('sk_test_51PylzqRq0gWoIKN4nEaYiVjis3ymX3apocMqP5s35ciPkBDv1uj1i83qR9S5uBqwz1KWiUVf1oQ1weDYiGxrsGs900E4qxL8h3');

            // Create a Stripe charge
            $charge = Charge::create([
                'amount' => $validatedData['finalTotal'] * 100, // Convert to cents
                'currency' => 'usd',
                'source' => $validatedData['stripeToken'],
                'description' => 'Payment for service',
                'metadata' => [
                    'firstName' => $validatedData['firstName'],
                    'lastName' => $validatedData['lastName'],
                    'email' => $validatedData['email'],
                    'phone' => $validatedData['phone'],
                    'street' => $validatedData['street'],
                    'apt' => $validatedData['apt'],
                    'city' => $validatedData['city'],
                    'postalCode' => $validatedData['postalCode'],
                    'service' => $validatedData['service'],
                    'bathroom' => $validatedData['bathroom'],
                    'typeOfService' => $validatedData['typeOfService'],
                    'storey' => $validatedData['storey'],
                    'frequency' => $validatedData['frequency'],
                    'day' => $validatedData['day'],
                    'time' => $validatedData['time'],
                    'discountPercentage' => $validatedData['discountPercentage'] ?? null,
                    'discountAmount' => $validatedData['discountAmount'] ?? null,
                    'couponDiscountAmount' => isset($validatedData['couponDiscountAmount']) && $validatedData['couponDiscountAmount'] !== null
                        ? '$' . number_format($validatedData['couponDiscountAmount'], 2)
                        : null,
                    'extras' => json_encode($validatedData['extras'] ?? null),
                    'totalExtras' => $validatedData['totalExtras'] ?? null,
                    'finalTotal' => '$' . $validatedData['finalTotal']
                ]
            ]);

            // Send the email
            Mail::to($validatedData['email'])->send(new PaymentDetailsMail($validatedData));

            // Insert data into the database
            $bookingId = DB::table('bookings')->insertGetId([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'street' => $validatedData['street'],
                'apt' => $validatedData['apt'],
                'city' => $validatedData['city'],
                'postal_code' => $validatedData['postalCode'],
                'service' => $validatedData['service'],
                'bathroom' => $validatedData['bathroom'],
                'typeOfService' => $validatedData['typeOfService'],
                'storey' => $validatedData['storey'],
                'frequency' => $validatedData['frequency'],
                'day' => $validatedData['day'],
                'time' => $validatedData['time'],
                'discountPercentage' => $validatedData['discountPercentage'] ?? 0,
                'discountAmount' => $validatedData['discountAmount'] ?? 0,
                'couponDiscountAmount' => $validatedData['couponDiscountAmount'] ?? 0,
                'extras' => json_encode($validatedData['extras'] ?? []),
                'totalExtras' => $validatedData['totalExtras'] ?? 0,
                'finalTotal' => $validatedData['finalTotal'],
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true, 'charge' => $charge]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }


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

    //     // for database data add

    //     $firstName = $data['firstName'] ?? null;
    //     $lastName = $data['lastName'] ?? null;
    //     $email = $data['email'] ?? null;
    //     $phone = $data['phone'] ?? null;
    //     $street = $data['street'] ?? null;
    //     $apt = $data['apt'] ?? null;
    //     $city = $data['city'] ?? null;
    //     $postalCode = $data['postalCode'] ?? null;
    //     $service = $data['service'] ?? null;
    //     $bathroom = $data['bathroom'] ?? null;
    //     $typeOfService = $data['typeOfService'] ?? null;
    //     $storey = $data['storey'] ?? null;
    //     $frequency = $data['frequency'] ?? null;
    //     $day = $data['day'] ?? null;
    //     $time = $data['time'] ?? null;
    //     $discountPercentage = $data['discountPercentage'] ?? 0;
    //     $discountAmount = $data['discountAmount'] ?? 0;
    //     $couponDiscountAmount = $data['couponDiscountAmount'] ?? 0;
    //     $extras = $data['extras'] ?? [];
    //     $totalExtras = $data['totalExtras'] ?? 0;
    //     $finalTotal = $data['finalTotal'] ?? 0;


    //     $bookingId = DB::table('bookings')->insertGetId([
    //         'firstName' => $firstName,
    //         'lastName' => $lastName,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'street' => $street,
    //         'apt' => $apt,
    //         'city' => $city,
    //         'postal_code' => $postalCode,
    //         'service' => $service,
    //         'bathroom' => $bathroom,
    //         'typeOfService' => $typeOfService,
    //         'storey' => $storey,
    //         'frequency' => $frequency,
    //         'day' => $day,
    //         'time' => $time,
    //         'discountPercentage' => $discountPercentage,
    //         'discountAmount' => $discountAmount,
    //         'couponDiscountAmount' => $couponDiscountAmount,
    //         'extras' => json_encode($extras),
    //         'totalExtras' => $totalExtras,
    //         'finalTotal' => $finalTotal,
    //         'status' => 'completed', // Initial status
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     // for stripe
    //     try {
    //         Stripe::setApiKey('sk_test_51PylzqRq0gWoIKN4nEaYiVjis3ymX3apocMqP5s35ciPkBDv1uj1i83qR9S5uBqwz1KWiUVf1oQ1weDYiGxrsGs900E4qxL8h3');
    //         // Collect all data from the request
    //         $data = $request->all();

    //         $charge = Charge::create([
    //             'amount' => $data['finalTotal'] * 100, // Convert to cents
    //             'currency' => 'usd',
    //             'source' => $data['stripeToken'],
    //             'description' => 'Payment for service', // Adjust description as needed
    //             'metadata' => [
    //                 'firstName' => $data['firstName'],
    //                 'lastName' => $data['lastName'],
    //                 'email' => $data['email'],
    //                 'phone' => $data['phone'],
    //                 'street' => $data['street'],
    //                 'apt' => $data['apt'],
    //                 'city' => $data['city'],
    //                 'postalCode' => $data['postalCode'],
    //                 'service' => $data['service'],
    //                 'bathroom' => $data['bathroom'],
    //                 'typeOfService' => $data['typeOfService'],
    //                 'storey' => $data['storey'],
    //                 'frequency' => $data['frequency'],
    //                 'day' => $data['day'],
    //                 'time' => $data['time'],
    //                 'discountPercentage' => $data['discountPercentage'] ?? null,
    //                 'discountAmount' => $data['discountAmount'] ?? null,
    //                 'couponDiscountAmount' => $data['couponDiscountAmount'] ?? null,
    //                 'extras' => json_encode($data['extras'] ?? null),
    //                 'totalExtras' => $data['totalExtras'] ?? null,
    //                 'finalTotal' => $data['finalTotal']
    //             ]
    //         ]);

    //         //for data send

    //         return response()->json(['success' => true, 'charge' => $charge]);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    //     }
    // }

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
