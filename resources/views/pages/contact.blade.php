@extends('layouts.app')
@section('title')
Contact
@endsection 
@section('main_content')
    <div class="contact-container">
        <div class="contact-info">
            <h2 id="yui_3_17_2_1_1721038714633_424">Contact Us</h2>
            <p>Email us at <a href="mailto:info@crystalcleansyd@gmail.com">info@crystalcleansyd@gmail.com</a></p>
            <p>Our average response time between 9:00 am and 6:00 pm is just 8 minutes. We're here and ready to assist
                you promptly!</p>
            <p>Give us a call at <a href="tel:0426280899">0426 280 899</a></p>
            <p>Office Hours are 9:00 am - 6:00 pm</p>
        </div>
        <div class="contact-form">
            <form action="https://formspree.io/f/xzzpdkpz" method="POST" onsubmit="return handleSubmit(event)">
                <!-- Replace with your Formspree endpoint -->
                <label for="name">Your name</label>
                <input type="text" id="name" name="name" required="" placeholder="John Doe">

                <label for="email">Your email</label>
                <input type="email" id="email" name="email" required="" placeholder="john.doe@example.com">

                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required="" placeholder="Inquiry about services">

                <label for="message">Your message (optional)</label>
                <textarea id="message" name="message" placeholder="Your message..."></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
