@extends('layouts.app')
@section('title')
    Home
@endsection
@section('main_content')
    <!-- main start  -->
    <!-- new-service start  -->
    <section class="new-service-area" style="position: relative;overflow: hidden;">
        <div id="block-yui_3_17_2_1_1720516738964_3057">
            <!-- Background image will be applied here -->
        </div>

        <div class="outer-container">
            <div class="container new-code">
                <h1>Professional Cleaning Services in Sydney</h1>
                <h2>Book Online Instantly or Call 0426-280-899</h2>
                <div class="sqs-block-form">
                    <div class="field-list">
                        <div class="field first-name">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="">
                        </div>
                        <div class="field last-name">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="">
                        </div>
                        <div class="field email">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="">
                        </div>
                        <div class="field service">
                            <label for="service">Choose your service</label>
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
                        <div class="field bathroom">
                            <label for="bathroom">Bathroom</label>
                            <select id="bathroom" name="bathroom">
                                <option value="1 Bathroom">1 Bathroom</option>
                                <option value="2 Bathroom">2 Bathrooms</option>
                                <option value="3 Bathroom">3 Bathrooms</option>
                                <option value="4 Bathroom">4 Bathrooms</option>
                                <option value="5 Bathroom">5 Bathrooms</option>
                                <option value="6 Bathroom">6 Bathrooms</option>
                                <option value="7 Bathroom">7 Bathrooms</option>
                            </select>
                        </div>
                        <div class="field frequency">
                            <label for="frequency">Frequency</label>
                            <select id="frequency" name="frequency">
                                <option value="Weekly">Weekly (Save 15%)</option>
                                <option value="Fortnightly">Fortnightly (Save 10%)</option>
                                <option value="Monthly">Monthly (Save 5%)</option>
                                <option value="One-time">One-time service</option>
                            </select>
                        </div>
                        <div class="submit-button">
                            <a href="#" id="book-now">Book in 60 Seconds! ($130 per Clean)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new service end  -->
    <!-- how it works area start  -->
    <section class="how-it-area">
        <div class="how-it-works-section">
            <h1>How It Works</h1>
            <div class="separator"></div>
            <div class="steps-container">
                <div class="step">
                    <div class="content-wrapper">
                        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b36bfa9a721873928705e8/1723034623407/Schedule+Now%21.jpg"
                            alt="Schedule Image" loading="lazy">
                        <h3>Book</h3>
                        <p>Select the perfect time for us to visit. Our online scheduling is hassle-free.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="content-wrapper">
                        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66ba17fc07413900af42007c/1723471879967/People+Cleaning.jpg"
                            alt="Clean Image" loading="lazy">
                        <h3>Clean</h3>
                        <p>Our skilled team uses top-notch techniques and eco-friendly products to purify your space.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="content-wrapper">
                        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66ba17fedf474271756d1450/1723471884045/Relax.jpg"
                            alt="Relax Image" loading="lazy">
                        <h3>Relax</h3>
                        <p>Take a deep breath and relax in the comfort of your impeccably clean home.</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('book-now') }}" class="book-now-button">Book Now!</a>
        </div>
    </section>
    <!-- how it works area end  -->
    <!-- discount area start  -->
    <section class="discount-area">
        <div id="custom-section">
            <div class="custom-content">
                <h2>Reliable Professionials. Outstanding Cleanliness.</h2>
                <p>At Crystal Clean, we’re more than just a cleaning service; we’re part of your community. As a proud
                    Sydney-based company, we understand the importance of trust and security when it comes to your home
                    and office.
                    That’s why every member of our team is not only meticulously vetted but also someone we would trust
                    in our own
                    homes.</p>
                <p class="last"><strong>When you choose Crystal Clean, you’re not just hiring a cleaner, you’re
                        welcoming a
                        professional.</strong></p>
                <h3>Meet Your Expert Cleaning Team in Sydney:</h3>
                <div class="features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </div>
                        <p>True Pros: Not just skilled, our cleaners love what they do. Expect nothing but sparkling
                            results.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shield">
                                <path
                                    d="M12 22c4.97-1.64 8-6.18 8-11V5.34c0-.6-.26-1.17-.71-1.58L12 .3 4.71 3.76c-.45.41-.71.98-.71 1.58V11c0 4.82 3.03 9.36 8 11z">
                                </path>
                            </svg>
                        </div>
                        <p>Fully Trusted: Every cleaner passes rigorous background checks because your safety is our top
                            priority.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-clock">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <p>Efficient & Thorough: We streamline our processes to ensure every clean is both efficient and
                            thorough,
                            without taking shortcuts.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l7.78 7.78 7.78-7.78a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg>
                        </div>
                        <p>Client Favorite: Our customers keep calling us back, and we love it! We're honored to be your
                            go-to for a
                            clean space.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- how it works area end  -->
    <!-- discount area start  -->
    <section class="discount-area">
        <div class="section-container">
            <section id="yui_3_17_2_1_1721103413821_413">
                <div class="promo-banner">
                    <div class="promo-text">
                        <h1 id="yui_3_17_2_1_1721029560499_470">Try us out with 10% off your first cleaning service in
                            Sydney!</h1>
                        <p>Don't miss out, sign up now to enjoy exclusive offers and a spotless home.</p>
                        <form id="coupon_form">
                            <input type="text" name="first-name" placeholder="First name" id="name">
                            <input type="text" name="email" id="email2" placeholder="Email">
                            <input type="hidden" name="discountPercent" value="10">
                            <input type="hidden" name="coupon" value="WELCOME10%">
                            <button id="custom" type="submit">Get coupon!</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- discount area end  -->
    {{-- testimonial area start  --}}
    <section class="testimonial-area">
        <div class="testimonial-title">
            <h1>From Satisfied Customers Across Sydney</h1>
        </div>
        <div class="review-container">
            @foreach ($reviews as $review)
                <div class="review-card">
                    <div class="review-header" style="display: flex; align-items: center;">
                        <div class="avatar">
                            @php
                                $nameParts = explode(' ', $review['author_name']);
                                $initials =
                                    strtoupper(substr($nameParts[0], 0, 1)) .
                                    (isset($nameParts[1]) ? strtoupper(substr($nameParts[1], 0, 1)) : '');
                            @endphp
                            {{ $initials }}
                        </div>
                        <div>
                            <div class="author-name">{{ $review['author_name'] }}</div>
                            <div class="review-date" style="color: #666; font-size: 12px;">
                                {{ \Carbon\Carbon::parse($review['time'])->isCurrentMonth() ? \Carbon\Carbon::parse($review['time'])->diffForHumans() : \Carbon\Carbon::parse($review['time'])->format('M j') }}
                            </div>
                        </div>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review['rating'])
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </span>
                        <a href="https://www.google.com/" target="__blank" class="google-icon">
                            <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                        </a>
                    </div>
                    @php
                        $fullText = $review['text'];
                        $trimmedText = implode(' ', array_slice(explode(' ', $fullText), 0, 40));
                    @endphp

                    <div class="review-text">
                        <span class="trimmed-text">
                            {{ $trimmedText }}@if (str_word_count($fullText) > 40)
                                ...
                            @endif
                        </span>
                        <span class="full-text" style="display: none;">{{ $fullText }}</span>
                    </div>

                    @if (str_word_count($fullText) > 40)
                        <button class="more-btn" onclick="toggleText(this)">More</button>
                    @endif

                    <div class="share">
                        <div class="share-btn">
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="review-card">
                <div class="avatar initials-avatar">
                    TK
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Tyler Kopplin</div>
                <div class="review-date">Jul 5</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Have used their service twice. Both for move in / move out cleans. Once for an
                    entire
                    2 bed home and once for a small 1 bed condo. Our first experience was flawless.
                </div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    JS
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Jane Smith</div>
                <div class="review-date">Jul 10</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">The team was very professional and did an amazing job! Highly recommend.</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    AD
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Alice Doe</div>
                <div class="review-date">Jul 12</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Great service, but there were a few small details missed. Overall satisfied!</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    MD
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Mark Davis</div>
                <div class="review-date">Jul 15</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Absolutely wonderful! I couldn’t ask for better service. Will use again!</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    RL
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Rachel Lee</div>
                <div class="review-date">Jul 20</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Good experience, but I expected a bit more attention to detail.</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    BP
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Brian Park</div>
                <div class="review-date">Jul 25</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Excellent service! The team went above and beyond my expectations.</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    SM
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Samantha Miller</div>
                <div class="review-date">Jul 30</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">Fantastic! Will definitely recommend to others.</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="avatar initials-avatar">
                    CN
                    <!-- Placeholder for initials -->
                </div>
                <div class="author-name">Chris Nelson</div>
                <div class="review-date">Aug 1</div>
                <div class="rating">
                    <span class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <a href="https://www.google.com/" target="__blank" class="google-icon">
                        <i class="fab fa-google" style="margin-left: 5px; font-size: 18px;"></i>
                    </a>
                </div>
                <div class="review-text">I had a great experience and will use their services again!</div>
                <div class="share">
                    <div class="share-btn">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script>
        function toggleText(button) {
            const trimmedText = button.previousElementSibling.querySelector('.trimmed-text');
            const fullText = button.previousElementSibling.querySelector('.full-text');

            if (trimmedText.style.display === "none") {
                trimmedText.style.display = "inline";
                fullText.style.display = "none";
                button.innerText = "More";
            } else {
                trimmedText.style.display = "none";
                fullText.style.display = "inline";
                button.innerText = "Less";
            }
        }
    </script>
    {{-- testimonial area end  --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // this code for service section
        $(document).ready(function() {
            $('#book-now').on('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Helper function to encode value and replace '%20' with '+'
                const getEncodedValue = (id) => {
                    const value = $(`#${id}`).val();
                    return encodeURIComponent(value).replace(/%20/g, '+');
                };

                // Get form values
                const firstName = getEncodedValue('first-name');
                const lastName = getEncodedValue('last-name');
                const email = $(`#email`).val();
                const service = getEncodedValue('service');
                const bathroom = getEncodedValue('bathroom');
                const frequency = getEncodedValue('frequency');

                // Check email validity only if email is provided
                if (email && !validateEmail(email)) {
                    toastr.error('Please Insert a valid email');
                    return;
                }

                // Encode the email address
                const encodedEmail = encodeURIComponent(email).replace(/%20/g, '+');

                // Create query parameters manually
                const params =
                    `first-name=${firstName}&last-name=${lastName}&email=${encodedEmail}&service=${service}&bathroom=${bathroom}&frequency=${frequency}`;
                window.location.href = '/book-now?' + params;
            });

            // Function to validate email address
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });
    </script>
    <script>
        $('#coupon_form').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            let formData = $('#coupon_form').serialize(); // Serialize form data

            let name = $('#name').val();
            let email = $('#email2').val();

            // Check if name is empty
            if (!name) {
                toastr.error('Name is required.');
                return; // Stop the form submission
            }

            // Check if email is empty
            if (!email) {
                toastr.error('Email is required.');
                return; // Stop the form submission
            }
            // Check if email is invalid
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex
            if (!emailPattern.test(email)) {
                toastr.error('Email is invalid.');
                return; // Stop the form submission
            }
            // Proceed with the AJAX request if both fields are valid
            $.ajax({
                url: '/custom-coupon', // Your desired endpoint
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#coupon_form')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error sending data:', error);
                }
            });
        });
    </script>
@endsection

{{-- for toaster css --}}
{{-- #toast-container {
position: fixed;
z-index: 999999;
pointer-events: none;
} --}}
