<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // Create a new booking
        $firstName = $data['firstName'] ?? null;
        $lastName = $data['lastName'] ?? null;
        $email = $data['email'] ?? null;
        $phone = $data['phone'] ?? null;
        $street = $data['street'] ?? null;
        $apt = $data['apt'] ?? null;
        $city = $data['city'] ?? null;
        $postalCode = $data['postalCode'] ?? null;
        $service = $data['service'] ?? null;
        $bathroom = $data['bathroom'] ?? null;
        $typeOfService = $data['typeOfService'] ?? null;
        $storey = $data['storey'] ?? null;
        $frequency = $data['frequency'] ?? null;
        $day = $data['day'] ?? null;
        $time = $data['time'] ?? null;
        $discountPercentage = $data['discountPercentage'] ?? 0;
        $discountAmount = $data['discountAmount'] ?? 0;
        $couponDiscountAmount = $data['couponDiscountAmount'] ?? 0;
        $extras = $data['extras'] ?? [];
        $totalExtras = $data['totalExtras'] ?? 0;
        $finalTotal = $data['finalTotal'] ?? 0;

        $description = "Booking Details:"."\n";
        $description .= "Name: $firstName $lastName\n";
        $description .= "Email: $email\n";
        $description .= "Phone: $phone\n";
        $description .= "Address: $street $apt, $city, $postalCode\n";
        $description .= "Service: $service\n";
        $description .= "Bathroom: $bathroom\n";
        $description .= "Type of Service: $typeOfService\n";
        $description .= "Storey: $storey\n";
        $description .= "Frequency: $frequency\n";
        $description .= "Day: $day\n";
        $description .= "Time: $time\n";
        $description .= "Discount Percentage: $discountPercentage%\n";
        $description .= "Discount Amount: $$discountAmount\n";
        $description .= "Coupon Discount Amount: $$couponDiscountAmount\n";
        $description .= "Total Extras: $$totalExtras\n";
        $description .= "Final Total: $$finalTotal\n";




        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $amountInDollars = $request->finalTotal;

        // Convert the amount to cents (integer)
        $amountInCents = $amountInDollars * 100;
        $checkout = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Booking',
                        'description' => $description,
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
        // dd($checkout);
        return response()->json(['url' => $checkout->url]);
    }
    public function success()
    {
        return "Payment Success!";
    }
    public function cancel()
    {
        return "Payment Cancel!";
    }
}
