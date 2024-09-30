<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index(){
        $placeId = 'ChIJibnoPYBW0iERc57oSdt3QL4'; // Your Place ID
        $apiKey = env('GOOGLE_API_KEY');

        $response = Http::get("https://maps.googleapis.com/maps/api/place/details/json", [
            'place_id' => $placeId,
            'key' => $apiKey,
            'fields' => 'reviews'
        ]);
        $reviews = $response->json()['result']['reviews'] ?? [];
        return view('home', compact('reviews'));
    }
}
