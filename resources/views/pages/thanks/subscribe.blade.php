@extends('layouts.app')
@section('title')
    Thanks You
@endsection
<style>
    .thank-you-container .thank-you-header {
        font-size: 38px !important;
        /* Adjust the size as needed and ensure it overrides other styles */
    }
</style>

@section('main_content')
    <div id="yui_3_17_2_1_1721300734963_411">
        <div class="thank-you-container" style="color: black !important;">
            <h1 class="thank-you-header" style="color: black !important;">Thank you for your subscription!</h1>
            <div class="thank-you-line" style="color: black !important;"></div>
            <div class="thank-you-content" style="color: black !important;">
                <p style="color: black !important;">We appreciate your subscription and joining our community. We will keep
                    you updated with the latest content and news. Check your email for confirmation and more details on what
                    you can expect. We look forward to providing you with great content!</p>
            </div>
        </div>
    </div>
@endsection
