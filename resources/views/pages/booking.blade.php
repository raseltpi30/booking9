@extends('layouts.app')
@section('title')
    Booking
@endsection
@section('main_content')
    <!-- main start  -->
    <section class="booking-page booking-section">
        <div class="booking-page booking-form-container">
            <div class="booking-page form-content">
                <div class="booking-page booking-container">
                    <h2 id="yui_3_17_2_1_1721228574982_440">Contact Information</h2>
                    <p>We'll use these details to follow up with you about your quote</p>
                    <form id="payment-form"> <!-- Updated form ID for Stripe integration -->
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="first-name">First Name *</label>
                                <input type="text" id="first-name" name="first-name">
                                <div id="first-name-error" class="error-message"></div>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="last-name">Last Name *</label>
                                <input type="text" id="last-name" name="last-name">
                                <div id="last-name-error" class="error-message"></div>
                            </div>
                        </div>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email">
                                <div id="email-error" class="error-message"></div>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone">
                                <div id="phone-error" class="error-message"></div>
                            </div>
                        </div>
                        <div class="booking-page checkbox-group">
                            <input type="checkbox" id="consent" name="consent">
                            <label for="consent">I'm giving my consent to receive SMS and email notifications</label>
                        </div>

                        <h2 id="yui_3_17_2_1_1721228574982_649">Address</h2>
                        <p>Where should we focus our cleaning efforts?</p>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="street">Street *</label>
                                <input type="text" id="street" name="street">
                                <div id="street-error" class="error-message"></div>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="apt">Apt #</label>
                                <input type="text" id="apt" name="apt">
                            </div>
                        </div>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city">
                                <div id="city-error" class="error-message"></div>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="postal-code">Postcode *</label>
                                <input type="text" id="postal-code" name="postal-code">
                                <div id="postal-code-error" class="error-message"></div>
                            </div>
                        </div>

                        <h2 id="yui_3_17_2_1_1721228574982_664">Choose Your Services</h2>
                        <p>Tell us about your home</p>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="service">Service</label>
                                <select id="service" name="service">
                                    <option value="Studio or 1 Bedroom">Studio or 1 Bedroom</option>
                                    <option value="2 Bedroom">2 Bedroom</option>
                                    <option value="3 Bedroom">3 Bedroom</option>
                                    <option value="4 Bedroom">4 Bedroom</option>
                                    <option value="5 Bedroom">5 Bedroom</option>
                                    <option value="6 Bedroom">6 Bedroom</option>
                                    <option value="7 Bedroom">7 Bedroom</option>
                                    <option value="8 Bedroom">8 Bedroom</option>
                                    <option value="9 Bedroom">9 Bedroom</option>
                                    <option value="10 Bedroom">10 Bedroom</option>
                                    <option value="11 Bedroom">11 Bedroom</option>
                                </select>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="bathroom">Bathroom</label>
                                <select id="bathroom" name="bathroom">
                                    <option value="1 Bathroom">1 Bathroom</option>
                                    <option value="2 Bathroom">2 Bathroom</option>
                                    <option value="3 Bathroom">3 Bathroom</option>
                                    <option value="4 Bathroom">4 Bathroom</option>
                                    <option value="5 Bathroom">5 Bathroom</option>
                                    <option value="6 Bathroom">6 Bathroom</option>
                                    <option value="7 Bathroom">7 Bathroom</option>
                                </select>
                            </div>
                        </div>

                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="type-of-service">Type of Service</label>
                                <select id="type-of-service" name="type-of-service">
                                    <option value="General Cleaning">General Cleaning</option>
                                    <option value="Deep Cleaning">Deep Cleaning</option>
                                    <option value="End of Lease Cleaning">End of Lease Cleaning</option>
                                    <option value="Organisation by the Hour">Organisation by the Hour</option>
                                </select>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="storey">Storey</label>
                                <select id="storey" name="storey">
                                    <option value="Single storey home">Single storey home</option>
                                    <option value="Double storey home">Double storey home</option>
                                    <option value="Triple storey home">Triple storey home</option>
                                </select>
                            </div>
                        </div>
                        <p>Note: If "Organisation by the Hour" is selected, please specify the number of hours in the
                            Extras section.</p>
                        <h2 id="yui_3_17_2_1_1721228574982_675">Select Extras</h2>
                        <p>Add upgrades to your service</p>
                        <div class="booking-page extras-group">
                            <div class="booking-page extra-item walls-interior-windows" data-price="70">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b34888eef7173402cfac33/1723025544944/Carpet+Cleaning.png"
                                    alt="Carpet Cleaning" loading="lazy">
                                <label>Carpet Cleaning $70/room</label>
                                <div class="counter-container">
                                    <div class="counter" id="carpet-counter"></div>
                                    <div class="counter-buttons">
                                        <span class="decrease">-</span>
                                        <span class="increase">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-page extra-item walls-interior-windows" id="organisation-addon"
                                data-price="80">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b3488dc79cee0b6e2e5891/1723025549738/Organisation+By+The+Hour.png"
                                    alt="Organisation By the Hour" loading="lazy">
                                <label>Organisation By the Hour $80/2 hours</label>
                                <div class="counter-container">
                                    <div class="counter" id="organisation-counter"></div>
                                    <div class="counter-buttons">
                                        <span class="decrease">-</span>
                                        <span class="increase">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-page extra-item" data-price="65">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345e7f190d24e77253799/1723024871898/Oven+Cleaning.png"
                                    alt="Oven Cleaning" loading="lazy">
                                <label>Oven Cleaning $65.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="35">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345e31616623d9cafbdd6/1723024867932/Refridgerator.png"
                                    alt="Refrigerator Cleaning Empty" loading="lazy">
                                <label>Refrigerator Cleaning Empty $35.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="50">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345e5aa512b5b2b6d2236/1723024869145/Refridgerator+Full+Cleaning.png"
                                    alt="Refrigerator Cleaning Full" loading="lazy">
                                <label>Refrigerator Cleaning Full $50.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="35">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345aacfa3d63672c6e6b0/1723024810170/Dish+Washer+Cleaning.png"
                                    alt="Dishwasher Cleaning" loading="lazy">
                                <label>Dishwasher Cleaning $35.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="65">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345741616623d9cafa78b/1723024756550/Cupboard+Empty+Cleaning.png"
                                    alt="Inside Cupboards Cleaning Empty" loading="lazy">
                                <label>Inside Cupboards Empty $65.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="60">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345f6341bc358818bfe4b/1723024886978/Window+Cleaning.png"
                                    alt="Window Cleaning" loading="lazy">
                                <label>Window Cleaning $60.00</label>
                            </div>
                            <div class="booking-page extra-item walls-interior-windows" data-price="30">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345d84be75066e5b57f9a/1723024856913/Sliding+Door+Cleaning.png"
                                    alt="Sliding Door Window Cleaning" loading="lazy">
                                <label>Sliding Door Window $30/set</label>
                                <div class="counter-container">
                                    <div class="counter" id="sliding-door-counter"></div>
                                    <div class="counter-buttons">
                                        <span class="decrease">-</span>
                                        <span class="increase">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-page extra-item" data-price="60">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345a76f0a5426e8a7fcf9/1723024807388/Blind+Cleaning.png"
                                    alt="Blind Cleaning" loading="lazy">
                                <label>Blind Cleaning $60.00</label>
                            </div>
                            <div class="booking-page extra-item walls-interior-windows" data-price="70">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345f5a7c84a4142c0a5f6/1723024885961/Wall+Washing.png"
                                    alt="Wall Washing" loading="lazy">
                                <label>Wall Washing $70/room</label>
                                <div class="counter-container">
                                    <div class="counter" id="wall-washing-counter"></div>
                                    <div class="counter-buttons">
                                        <span class="decrease">-</span>
                                        <span class="increase">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-page extra-item" data-price="40">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345b26f0a5426e8a7fe51/1723024818522/High+Dusting.png"
                                    alt="High Dusting" loading="lazy">
                                <label>High Dusting $40.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="35">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345b2fabc99253955cedd/1723024818492/Garage+Cleaning.png"
                                    alt="Garage Cleaning" loading="lazy">
                                <label>Garage Cleaning $35.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="35">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345748706157585719b55/1723024756749/Balcony+Cleaning+Small.png"
                                    alt="Balcony Cleaning Small" loading="lazy">
                                <label>Balcony Cleaning Small $35.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="65">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b34574543ce308c7e27e0b/1723024756753/Balcony+Cleaning+Large.png"
                                    alt="Balcony Cleaning Large" loading="lazy">
                                <label>Balcony Cleaning Large $65.00</label>
                            </div>
                            <div class="booking-page extra-item walls-interior-windows" data-price="10">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345749ae2157f850c788a/1723024756405/Cleaning+Sheets.png"
                                    alt="Change Sheets" loading="lazy">
                                <label>Change Sheets $10/bed</label>
                                <div class="counter-container">
                                    <div class="counter" id="change-sheets-counter"></div>
                                    <div class="counter-buttons">
                                        <span class="decrease">-</span>
                                        <span class="increase">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-page extra-item" data-price="35">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345e155d16c02545c508e/1723024865903/Shed+Cleaning.png"
                                    alt="Shed/Pool House Cleaning" loading="lazy">
                                <label>Shed/Pool House $35.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="75">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345b2f3b8b50fb6576a18/1723024818484/Next+Day+Booking.png"
                                    alt="Next Day Booking Fee" loading="lazy">
                                <label>Next Day Booking Fee $75.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="25">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b345b2168d21631f11b1f6/1723024818663/I+Have+Pets.png"
                                    alt="I Have Pets Fee" loading="lazy">
                                <label>I Have Pets $25.00</label>
                            </div>
                            <div class="booking-page extra-item" data-price="20">
                                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b348304db36d266a5c9d17/1723025456552/Street+Parking.png"
                                    alt="Street Parking Fee" loading="lazy">
                                <label>Street Parking Fee $20.00</label>
                            </div>
                        </div>

                        <h2 id="yui_3_17_2_1_1721228574982_675">When would you like us to come?</h2>
                        <p>The day and time that suits you best</p>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item">
                                <label for="day">Pick a day</label>
                                <input type="date" id="day" name="day">
                                <div id="day-error" class="error-message"></div>
                            </div>
                            <div class="booking-page grid-item">
                                <label for="time">Pick a time</label>
                                <select id="time" name="time">
                                    <option value="07:00">7:00 AM</option>
                                    <option value="07:30">7:30 AM</option>
                                    <option value="08:00">8:00 AM</option>
                                    <option value="08:30">8:30 AM</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="09:30">9:30 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="10:30">10:30 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="11:30">11:30 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="12:30">12:30 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="13:30">1:30 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="14:30">2:30 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="15:30">3:30 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="16:30">4:30 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                </select>
                                <div id="time-error" class="error-message"></div>
                            </div>
                        </div>

                        <h2 id="yui_3_17_2_1_1721228574982_686">How Often?</h2>
                        <p>Select how often you'd like the service</p>
                        <div class="booking-page frequency-group">
                            <div class="booking-page radio-item">
                                <input type="radio" id="fortnightly" name="frequency" value="Fortnightly">
                                <label for="fortnightly">Fortnightly (Save 10%)</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="monthly" name="frequency" value="Monthly">
                                <label for="monthly">Monthly (Save 5%)</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="weekly" name="frequency" value="Weekly">
                                <label for="weekly">Weekly (Save 15%)</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="one-time" name="frequency" value="One-time">
                                <label for="one-time">One-time service</label>
                            </div>
                        </div>

                        <h2 id="yui_3_17_2_1_1721228574982_701">Accessibility</h2>
                        <p>How will the cleaners enter your home?</p>
                        <div class="booking-page entry-group">
                            <div class="booking-page radio-item">
                                <input type="radio" id="home-entry" name="entry" value="home">
                                <label for="home-entry">I'll be home to let them in</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="key-entry" name="entry" value="key">
                                <label for="key-entry">I'll leave a key</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="code-entry" name="entry" value="code">
                                <label for="code-entry">I'll provide an access code</label>
                            </div>
                            <div class="booking-page radio-item">
                                <input type="radio" id="other-entry" name="entry" value="other">
                                <label for="other-entry">Other </label>
                            </div>
                        </div>
                        <h2 id="yui_3_17_2_1_1721228574982_732">Any information you'd like to share?</h2>
                        <p>Provide us with more details.</p>
                        <div class="booking-page form-group">
                            <div class="booking-page grid-item-full">
                                <textarea id="notes" name="notes" placeholder="Property access information, your dog's name, etc"></textarea>
                            </div>
                        </div>
                        <div class="card-container">
                            <h2 id="yui_3_17_2_1_1721228574982_747">Credit Card Details</h2>
                            <p>Enter your card information below. You will be charged after service has been rendered.</p>
                            <div class="card-error-new">
                                <div class="error-alert">
                                    <div class="error-icon">✖</div>
                                    <div class="error-card-message">
                                        <strong>Something went wrong</strong>
                                        <p style="margin: 0">Please complete the form to submit.</p>
                                    </div>
                                    <div class="card-close">✖</div>
                                </div>
                            </div>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <div id="card-errors" role="alert"></div> <!-- Display card errors -->
                            <button type="submit" id="complete-booking-button" style="position: relative">Complete
                                Booking <div id="loader" class="loader" style="position: absolute"></div></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="booking-page questions-content">
                <h2 id="yui_3_17_2_1_1721229401406_413">Questions?</h2>
                <div class="booking-page question-item">
                    <h3><span class="toggle-icon">+</span> What is included in a cleaning service?</h3>
                    <p>We offer standard cleaning, deep cleaning, move-in and move-out cleaning, and hourly organization
                        services. For more details, see our <a href="/faq">FAQ page</a>.</p>
                </div>
                <div class="booking-page question-item">
                    <h3><span class="toggle-icon">+</span> Who is cleaning my home?</h3>
                    <p>Our team of professional cleaners is trained, vetted, and dedicated to providing the highest
                        quality service. We ensure your home is in good hands with our trustworthy and experienced
                        staff.</p>
                </div>
                <div class="booking-page question-item">
                    <h3><span class="toggle-icon">+</span> Can I skip or reschedule bookings?</h3>
                    <p>Any changes to your booking must be made at least 24 hours before the scheduled service. Please
                        contact us at info.crystalcleansyd@gmail.com for any changes.</p>
                </div>
                <div class="booking-page question-item">
                    <h3><span class="toggle-icon">+</span> What is your cancellation policy?</h3>
                    <p>You may cancel your booking up to 24 hours before the scheduled service for a full refund.
                        Cancellations made less than 24 hours in advance may incur a $50 cancellation fee.</p>
                </div>
                <div class="booking-page image-content">
                    <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b3461337a2ce52082ab83f/1723024918365/Book+Now+3.jpg"
                        class="booking-image" alt="Book Now" loading="lazy">
                </div>
                <!-- Discount Code Input Field -->
                <div class="discount-code-container">
                    <input type="text" id="discount-code" class="discount-code-input" placeholder="Discount Code">
                    <button type="button" class="apply-discount-button">Apply Code</button>
                </div>
                <div class="pricing-summary">
                    <div class="pricing-summary">
                        <h3>Cleaning Plan</h3>
                        <p id="cleaning-plan-details">Studio or 1 bedroom, 1 bathroom, Single storey home</p>
                        <p id="service-cost" style="font-weight: 500;">General Cleaning: $130</p>
                        <h3>Selected Extras: <span id="extras-total" style="font-size: 0.8em;">$0.00</span></h3>
                        <ul id="selected-extras" style="font-size: 0.8em;"></ul>
                        <p id="frequency-discount"></p>
                        <div id="discount-amount"></div>
                        <h3 id="total-price-container">Total: $<span id="total">130.00</span></h3>
                        <input type="text" id="total-price-input" readonly />
                        <input type="text" id="total-price-2" readonly />
                        <input type="text" id="total-price-3" readonly />
                    </div>

                    <!-- Credit Card Details -->

                </div>
            </div>
    </section>
    <!-- main end  -->
@endsection


<style>
    .card-error-new {
        display: none;
    }

    .error-alert {
        display: flex;
        align-items: center;
        background-color: #ffeeee;
        color: #d9534f;
        padding: 5px 20px;
        border-radius: 5px;
        font-family: Arial, sans-serif;
        width: 100%;
        position: relative;
        margin-bottom: 20px;
    }

    .error-alert .error-icon {
        background: #f56c6c;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        height: 10;
        width: 10px;
        height: 10px;
        padding: 12px;
        margin-right: 15px;
    }

    .card-close {
        position: absolute;
        top: 10%;
        z-index: 100;
        cursor: pointer;
        right: 2%;
    }

    #complete-booking-button {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader {
        border: 3px solid #f3f3f3;
        /* Light grey */
        border-top: 3px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 40px;
        height: 40px;
        -webkit-animation: spin 1s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        margin: auto;
        display: none;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
