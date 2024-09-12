@extends('layouts.app')
@section('title')
Commercial Quotes
@endsection
@section('main_content')
    <section class="form-section">
        <form class="quote-form" action="https://formspree.io/f/xzzpdkpz" method="POST" onsubmit="return handleSubmit(event)">
            <!-- Ensure this matches your Formspree endpoint -->
            <fieldset>
                <legend>Contact Information</legend>
                <p style="font-weight: normal;">We'll use these details to follow up with you about your quote.</p>
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name">First Name *</label>
                        <input type="text" id="first-name" name="first-name" placeholder="John" required="">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name *</label>
                        <input type="text" id="last-name" name="last-name" placeholder="Doe" required="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="john.doe@example.com"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" placeholder="0412 345 123" required="">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Address</legend>
                <p style="font-weight: normal;">Where should we focus our cleaning efforts?</p>
                <div class="form-row">
                    <div class="form-group">
                        <label for="street">Street Address *</label>
                        <input type="text" id="street" name="street" placeholder="123 Example Street" required="">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit/Apt/Suite # (Optional)</label>
                        <input type="text" id="unit" name="unit" placeholder="Apt 25">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <input type="text" id="city" name="city" placeholder="Sydney" required="">
                    </div>
                    <div class="form-group">
                        <label for="postal-code">Post Code *</label>
                        <input type="text" id="postal-code" name="postal-code" placeholder="2000" required="">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Cleaning Details</legend>
                <p style="font-weight: normal;">Provide us with more details about your cleaning needs.</p>
                <div class="form-row">
                    <div class="form-group">
                        <label for="square-footage">Total Square Footage (m²) *</label>
                        <input type="number" id="square-footage" name="square-footage" placeholder="5000" required="">
                    </div>
                    <div class="form-group">
                        <label for="number-floors">Number of Floors *</label>
                        <input type="number" id="number-floors" name="number-floors" placeholder="3" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="types-areas">Types of Areas to be Cleaned *</label>
                    <input type="text" id="types-areas" name="types-areas" placeholder="Offices, Restrooms, Kitchens"
                        required="">
                </div>
                <div class="form-group">
                    <label for="specific-tasks">Specific Cleaning Tasks Required *</label>
                    <textarea id="specific-tasks" name="specific-tasks"
                        placeholder="Describe the specific tasks required and identify high-traffic areas that need extra attention."
                        rows="3" required=""></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="cleaning-frequency">Desired Cleaning Frequency *</label>
                        <input type="text" id="cleaning-frequency" name="cleaning-frequency"
                            placeholder="One Time, Weekly, Fortnightly, Monthly" required="">
                    </div>
                    <div class="form-group">
                        <label for="cleaning-schedule">Ideal Cleaning Days and Times *</label>
                        <input type="text" id="cleaning-schedule" name="cleaning-schedule"
                            placeholder="Monday mornings, after hours" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="access-security">Building Access and Security Requirements *</label>
                    <textarea id="access-security" name="access-security"
                        placeholder="Describe how cleaning staff will access the building and any security requirements." rows="3"
                        required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="additional-services">Any Additional Services Required</label>
                    <textarea id="additional-services" name="additional-services"
                        placeholder="Describe any additional services you may need." rows="3"></textarea>
                </div>
            </fieldset>

            <div class="form-group">
                <button type="submit">Request Quote</button>
            </div>
        </form>
    </section>
@endsection
