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
use App\Models\Booking;
use DrewM\MailChimp\MailChimp;
use Illuminate\Support\Facades\Log;


class BookingController extends Controller
{
    // for mail chimp 
    private $apiKey = 'd73f9069359cdb0b1be89b97790a96d5-us10'; // Replace with your actual API key
    private $audienceId = '4bebf538ef'; // Replace with your actual Audience ID
    private $mailchimp;

    public function __construct()
    {
        $this->mailchimp = new MailChimp($this->apiKey);
    }
    // for mail chimp up code 

    public function store(Request $request)
    {
        // return $request->all();
        $existingBooking = DB::table('bookings')->where('email', $request->email)->first();
        if ($existingBooking) {
            return response()->json(['success' => false, 'error' => 'Booking failed because email already exists.'], 400);
        } else {
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
                // Stripe::setApiKey('sk_test_51PylzqRq0gWoIKN4nEaYiVjis3ymX3apocMqP5s35ciPkBDv1uj1i83qR9S5uBqwz1KWiUVf1oQ1weDYiGxrsGs900E4qxL8h3');
                Stripe::setApiKey('sk_test_51Pg0xxIpCrzhTk3nRAASulLvCNw1F6cry0qmQjejIx7XLUCb5UcD6IF3JlW32GuwTQYV6OqAbDzPxEIGWKKl9aGJ002aMwhWc2');

                // Create a Stripe charge
                $charge = Charge::create([
                    'amount' => $validatedData['finalTotal'] * 100, // Convert to cents
                    'currency' => 'usd',
                    'source' => $validatedData['stripeToken'],
                    'description' => 'Payment for service',
                    'metadata' => [
                        'First Name' => $validatedData['firstName'],
                        'Last Name' => $validatedData['lastName'],
                        'Email' => $validatedData['email'],
                        'phone' => $validatedData['phone'],
                        'Street' => $validatedData['street'],
                        'Apt' => $validatedData['apt'],
                        'City' => $validatedData['city'],
                        'Postal Code' => $validatedData['postalCode'],
                        'Service' => $validatedData['service'],
                        'Bathroom' => $validatedData['bathroom'],
                        'Type Of Service' => $validatedData['typeOfService'],
                        'Storey' => $validatedData['storey'],
                        'Frequency' => $validatedData['frequency'],
                        'Day' => $validatedData['day'],
                        'Time' => $validatedData['time'],
                        'Discount Percentage' => $validatedData['discountPercentage'] . '%' ?? null,
                        'Discount Amount' => '$' . $validatedData['discountAmount'] ?? null,
                        'Coupon Discount Amount' => isset($validatedData['couponDiscountAmount']) && $validatedData['couponDiscountAmount'] !== null
                            ? '$' . number_format($validatedData['couponDiscountAmount'], 2)
                            : null,
                        'Total Extras' => '$' . $validatedData['totalExtras'] ?? null,
                        'FinalTotal' => '$' . $validatedData['finalTotal']
                    ]
                ]);

                // Send the email
                // Mail::to($validatedData['email'])->send(new PaymentDetailsMail($validatedData));


                //for mailchimp

                // $email = $request->email;
                // $memberHash = $this->mailchimp->subscriberHash($email);
                // $member = $this->mailchimp->get("lists/{$this->audienceId}/members/{$memberHash}");

                // // If the email was previously unsubscribed, re-subscribe it
                // if ($member && isset($member['status']) && $member['status'] === 'unsubscribed') {
                //     $result = $this->mailchimp->put("lists/{$this->audienceId}/members/{$memberHash}", [
                //         'status' => 'subscribed',
                //         'merge_fields' => [
                //             'FNAME' => $request->firstName,
                //             // 'LNAME' => $request->lastName,
                //             // 'ADDRESS' => $request->street.','.$request->apt.','.$request->city,
                //             // 'PHONE' => $request->phone,
                //             // 'PCODE' => $request->postalCode,
                //             // 'FREQUENCY' => $request->frequency.' '.$request->discountPercentage.'%',
                //             // 'FAMOUNT' => $request->discountAmount,
                //             // 'CAMOUNT' => $request->couponDiscountAmount ?? null,
                //             // 'TTOTAL' => $request->totalExtras,
                //             // 'FTOTAL' => $request->finalTotal,
                //         ],
                //     ]);
                // } else {
                //     // If the email is new, add it
                //     $result = $this->mailchimp->post("lists/{$this->audienceId}/members", [
                //         'email_address' => $email,
                //         'status' => 'subscribed',
                //         'merge_fields' => [
                //             'FNAME' => $request->firstName . ' ' . $request->lastName,
                //             'ADDRESS' => $request->street.', '.$request->apt.', '.$request->city,
                //             'PHONE' => $request->phone,
                //             'PCODE' => $request->postalCode,
                //             'FREQUENCY' => $request->frequency . ' ' . $request->discountPercentage . '%',
                //             'FAMOUNT' => $request->discountAmount,
                //             'CAMOUNT' => $request->couponDiscountAmount ?? 0,
                //             'TTOTAL' => $request->totalExtras ?? 0,
                //             'FTOTAL' => $request->finalTotal,
                //         ],
                //     ]);
                // }
                // mailchimp code end

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
                    'status' => 'processing',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return response()->json(['success' => true, 'charge' => $charge]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
            }
        }
    }
}
