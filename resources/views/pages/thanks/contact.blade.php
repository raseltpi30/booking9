@extends('layouts.app')
@section('title')
    Thanks Thanks You
@endsection
<style>
    .thank-you-container .thank-you-header {
        font-size: 38px !important;
        /* Adjust the size as needed and ensure it overrides other styles */
    }
</style>

@section('main_content')
    <div id="yui_3_17_2_1_1721300520335_422">
        <div class="thank-you-container" style="color: black !important;">
            <h1 class="thank-you-header" style="color: black !important;" id="yui_3_17_2_1_1721975387771_409">Thank you for
                contacting us!</h1>
            <div class="thank-you-line" style="color: black !important;"></div>
            <div class="thank-you-content" style="color: black !important;">
                <p style="color: black !important;">We appreciate you reaching out to us. Our team will review your message
                    and respond to you as soon as possible. We aim to address all inquiries promptly and look forward to
                    assisting you with your needs. Thank you for getting in touch!</p>
            </div>
        </div>
    </div>
@endsection
