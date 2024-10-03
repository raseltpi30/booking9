<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DrewM\MailChimp\MailChimp;

class IndexController extends Controller
{
    private $apiKey = '97047cc84827d48cda4cd30b08755225-us10'; // Your API key
    private $audienceId = '4bebf538ef'; // Your Audience ID
    // private $apiKey = '51ba7e8f4f1c15a0cce7654f00e0ec9a-us17'; // Your API key
    // private $audienceId = '7e0676158c'; // Your Audience ID
    private $mailchimp;

    public function __construct()
    {
        $this->mailchimp = new MailChimp($this->apiKey);
    }

    public function subscribe(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $memberHash = $this->mailchimp->subscriberHash($email);

        // Try to add the subscriber
        $result = $this->mailchimp->post("lists/{$this->audienceId}/members", [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);

        // Return a simple response
        if ($this->mailchimp->success()) {
            $notification = array('message' => 'Subscribe Successfully!', 'alert-type' => 'success');
            return redirect()->route('subscribe.thanks')->with($notification);
        } else {
            $notification = array('message' => 'Email alreay subscribe!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
    public function index()
    {
        $placeId = 'ChIJibnoPYBW0iERc57oSdt3QL4'; // Your Place ID
        $apiKey = 'AIzaSyCeWaWnnt7u9wRWZVCUBBekySgdCrVQ_lQ';

        $response = Http::get("https://maps.googleapis.com/maps/api/place/details/json", [
            'place_id' => $placeId,
            'key' => $apiKey,
            'fields' => 'reviews'
        ]);
        $reviews = $response->json()['result']['reviews'] ?? [];
        return view('home', compact('reviews'));
    }
}
