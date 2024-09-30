<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    private $apiKey = 'AIzaSyCeWaWnnt7u9wRWZVCUBBekySgdCrVQ_lQ'; // Replace with your Google Places API Key

    public function autocomplete(Request $request)
    {
        if ($request->has('input')) {
            $input = urlencode($request->input('input'));
            $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input={$input}&key={$this->apiKey}";

            // Fetch data from Google Places API
            $response = Http::get($url);

            return response()->json($response->json());
        }

        return response()->json(['error' => 'No input provided'], 400);
    }

    public function details(Request $request)
    {
        if ($request->has('place_id')) {
            $placeId = urlencode($request->input('place_id'));
            $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&key={$this->apiKey}";

            // Fetch data from Google Places API
            $response = Http::get($url);

            return response()->json($response->json());
        }

        return response()->json(['error' => 'No place_id provided'], 400);
    }
}
