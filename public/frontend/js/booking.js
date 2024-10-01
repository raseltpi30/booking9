$(document).ready(function () {
    console.log('DOM fully loaded and parsed');
    $('#total-price-3').val(''); // for refresh page coupon when i refresh page coupon input will 0.

    // Extract query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const firstName = urlParams.get('first-name');
    const lastName = urlParams.get('last-name');
    const email = urlParams.get('email');
    const service = urlParams.get('service');
    const bathroom = urlParams.get('bathroom');
    const frequency = urlParams.get('frequency');

    // Set form values if query parameters are present
    if (firstName) $('#first-name').val(firstName);
    if (lastName) $('#last-name').val(lastName);
    if (email) $('#email').val(email);
    if (bathroom) $('#bathroom').val(bathroom);
    if (frequency) $(`input[name="frequency"][value="${frequency}"]`).prop('checked', true);

    // Prices and extra data
    const servicePrices = {
        "Studio or 1 Bedroom": 0,
        "2 Bedroom": 25,
        "3 Bedroom": 50,
        "4 Bedroom": 75,
        "5 Bedroom": 100,
        "6 Bedroom": 125,
        "7 Bedroom": 150,
        "8 Bedroom": 175,
        "9 Bedroom": 200,
        "10 Bedroom": 225,
        "11 Bedroom": 250
    };

    const endOfLeaseServicePrices = {
        "Studio or 1 Bedroom": 0,
        "2 Bedroom": 50,
        "3 Bedroom": 100,
        "4 Bedroom": 150,
        "5 Bedroom": 200,
        "6 Bedroom": 250,
        "7 Bedroom": 300,
        "8 Bedroom": 350,
        "9 Bedroom": 400,
        "10 Bedroom": 450,
        "11 Bedroom": 500
    };

    const bathroomPrices = {
        "1 Bathroom": 0,
        "2 Bathroom": 25,
        "3 Bathroom": 50,
        "4 Bathroom": 75,
        "5 Bathroom": 90,
        "6 Bathroom": 115,
        "7 Bathroom": 130
    };

    const storeyPrices = {
        "Single storey home": 0,
        "Double storey home": 35,
        "Triple storey home": 70
    };

    const typeOfServicePrices = {
        "General Cleaning": 130,
        "Deep Cleaning": 220,
        "End of Lease Cleaning": 400,
        "Organisation by the Hour": 0
    };

    const frequencyDiscounts = {
        "Weekly": 0.15,
        "Fortnightly": 0.10,
        "Monthly": 0.05,
        "One-time": 0
    };

    const freeAddOns = {
        "Deep Cleaning": ["High Dusting", "I Have Pets"],
        "End of Lease Cleaning": ["Oven Cleaning", "Refrigerator Cleaning Full", "Dishwasher Cleaning", "Inside Cupboards Empty", "Window Cleaning", "Blind Cleaning", "High Dusting", "I Have Pets"],
        "Organisation by the Hour": ["Oven Cleaning", "Refrigerator Cleaning Empty", "Refrigerator Cleaning Full", "Dishwasher Cleaning", "Inside Cupboards Empty", "Window Cleaning", "Sliding Door Window", "Blind Cleaning", "High Dusting", "Garage Cleaning", "Balcony Cleaning Small", "Balcony Cleaning Large", "Change Sheets", "Shed/Pool House", "I Have Pets"]
    };

    let discountCode = '';
    let discountAmount = 0;


    const calculateTotal = () => {
        let total = 0;
        let extrasTotal = 0;

        const service = $('#service').val();
        const bathroom = $('#bathroom').val();
        const storey = $('#storey').val();
        const typeOfService = $('#type-of-service').val();

        total += (typeOfService === "End of Lease Cleaning" ? endOfLeaseServicePrices[service] : servicePrices[service]) || 0;
        total += bathroomPrices[bathroom] || 0;
        total += storeyPrices[storey] || 0;
        total += typeOfServicePrices[typeOfService] || 0;

        $('#cleaning-plan-details').text(`${service}, ${bathroom}, ${storey}`);
        $('#service-cost').text(`${typeOfService}: $${typeOfServicePrices[typeOfService]}`);

        console.log('Base total:', total);
        $('#service-cost').text(`$${total.toFixed(2)}`);

        const selectedExtras = $('.extra-item.highlighted');
        const extrasList = $('#selected-extras').empty();
        const extraCounts = {};
        const extrasObject = {}; // Object to store extras details

        selectedExtras.each(function () {
            const $extra = $(this);
            const price = parseFloat($extra.data('price'));
            const label = $extra.find('label').text().split(' $')[0];
            const count = parseInt($extra.find('.counter').text()) || 1;

            if (extraCounts[label]) {
                extraCounts[label].count += count;
            } else {
                extraCounts[label] = { price, count };
            }
        });

        // console.log('Extras before processing free add-ons:', extraCounts);

        $.each(extraCounts, (label, item) => {
            let itemTotal = item.price * item.count;

            if (freeAddOns[typeOfService] && freeAddOns[typeOfService].includes(label)) {
                itemTotal = 0;
            }

            total += itemTotal;
            extrasTotal += itemTotal;



            extrasObject[label] = {
                price: item.price,
            };

            const $listItem = $('<li>').text(item.count > 1 ? `${label} x${item.count}` : `${label}`);
            extrasList.append($listItem);
        });

        $('#extras-total').text(`$${extrasTotal.toFixed(2)}`);
        // console.log('Total after extras:', total);

        const frequencyDiscount = $('input[name="frequency"]:checked').val();
        if (frequencyDiscount) {
            const discount = frequencyDiscounts[frequencyDiscount];
            const frequencyDiscountAmount = total * discount;
            total -= frequencyDiscountAmount;
            $('#frequency-discount').text(`-$${frequencyDiscountAmount.toFixed(2)}`);
            $('#total-price-2').val(frequencyDiscountAmount.toFixed(2));
            // console.log('Total after frequency discount:', total);
        } else {
            $('#frequency-discount').text('');
        }

        // if (discountCode === 'WELCOME10%') {
        //     discountAmount = total * 0.10;
        //     $('#discount-amount').text(`Discount (10%): -$${discountAmount.toFixed(2)}`);
        //     $('#total-price-3').val(discountAmount.toFixed(2));
        // } else {
        //     discountAmount = 0;
        //     $('#discount-amount').text('');
        // }

        $('.apply-discount-button').on('click', function () {
            const discountCode = $('#discount-code').val();  // Get the coupon code entered by the use
            // Coupon Discount Calculation

            if (discountCode === '') {
                // Show error if the coupon code is empty
                $('#discount-code-error').text('Cpupon Code is Required!.');
                return;  // Stop further execution
            } else {
                // $('#discount-code-error').hide();
                $.ajax({
                    url: '/check-coupon',  // URL to the Laravel route for applying the coupon
                    type: 'POST',
                    data: {
                        couponCode: discountCode,  // Send the entered coupon code
                        _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                    },
                    success: function (data) {
                        let discountAmount = 0;  // Initialize discount amount
                        if (data.success) {
                            $('#discount-code-error').hide();
                            // If the coupon code is valid, apply the discount
                            discountAmount = total * (data.discount_percent / 100);  // Calculate discount
                            $('#discount-amount').text(`Discount (${data.discount_percent}%): -$${discountAmount.toFixed(2)}`);  // Show discount
                            $('#total-price-3').val(discountAmount.toFixed(2));  // Set the discount amount input value
                            // console.log(discountAmount);

                            // console.log(data.message);
                            // $('#discount-code').val(''); for hid this value of discout code
                            const successMessage = `${data.message} Discount amount: <span style="color: black;">-$${discountAmount.toFixed(2)}</span>.`;
                            $('#discount-code-success').html(successMessage);
                            $('.apply-discount-button').prop('disabled', true);
                            $('#discount-code').prop('disabled', true);
                        }
                        else {
                            // If the coupon is invalid, clear the discount display
                            $('#discount-amount').text('');
                            $('#discount-code-error').text(data.message);
                        }

                        // Subtract coupon discount from total
                        total -= discountAmount;
                        $('#total').text(`$${total.toFixed(2)}`);  // Show the final total after discounts
                        $('#total-price-input').val(total.toFixed(2));  // Set the final total in hidden input
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            }

        });

        total -= discountAmount;
        $('#total').text(`$${total.toFixed(2)}`);
        $('#total-price-input').val(total.toFixed(2));
        // console.log('Final total after all discounts:', total);

        // Store the extras object globally or in an appropriate scope
        window.extrasObject = extrasObject;
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    const resetAllAddOns = () => {
        $('.extra-item').removeClass('highlighted always-visible').css('pointer-events', 'auto').find('.counter').text('');
    };

    const handleTypeOfServiceChange = () => {
        const typeOfService = $('#type-of-service').val();
        resetAllAddOns();

        $('.extra-item').each(function () {
            const $extra = $(this);
            const label = $extra.find('label').text().split(' $')[0];
            const $counter = $extra.find('.counter');
            const $increaseButton = $extra.find('.increase');
            const $decreaseButton = $extra.find('.decrease');

            if (typeOfService === "Deep Cleaning" && freeAddOns["Deep Cleaning"].includes(label)) {
                $extra.addClass('highlighted').css('pointer-events', 'none');
            } else if (typeOfService === "End of Lease Cleaning" && freeAddOns["End of Lease Cleaning"].includes(label)) {
                $extra.addClass('highlighted').css('pointer-events', 'none');
            } else if (typeOfService === "Organisation by the Hour") {
                if (label === "Carpet Cleaning $70/room") {
                    $extra.addClass('highlighted always-visible');
                    $counter.text('1');
                    $increaseButton.show();
                    $decreaseButton.show().css('pointer-events', 'none');

                    if (!$('#select-hours-note').length) {
                        $('<div>', {
                            id: 'select-hours-note',
                            text: 'Please Select Hours',
                            css: { color: 'red' }
                        }).appendTo($extra);
                    }
                } else if (freeAddOns["Organisation by the Hour"].includes(label)) {
                    $extra.addClass('highlighted').css('pointer-events', 'none');
                }
            }
        });

        calculateTotal();
    };

    const setupEventListeners = () => {
        $('select, input[name="frequency"]').change(calculateTotal);

        $('.extra-item').each(function () {
            const $extra = $(this);

            if ($extra.hasClass('walls-interior-windows')) {
                const $counter = $extra.find('.counter');
                let count = parseInt($counter.text()) || 0;

                const $increaseButton = $extra.find('.increase');
                const $decreaseButton = $extra.find('.decrease');

                $increaseButton.click(function (event) {
                    event.stopPropagation();
                    count++;
                    $counter.text(count);
                    $extra.addClass('highlighted');
                    $decreaseButton.css('pointer-events', count > 0 ? 'auto' : 'none');
                    calculateTotal();
                });

                $decreaseButton.click(function (event) {
                    event.stopPropagation();
                    if (count > 0) {
                        count--;
                        $counter.text(count);
                        if (count === 0) {
                            $extra.removeClass('highlighted');
                            $counter.text("");
                        }
                        $decreaseButton.css('pointer-events', count > 0 ? 'auto' : 'none');
                        calculateTotal();
                    }
                });
            } else {
                $extra.click(function () {
                    $(this).toggleClass('highlighted');
                    calculateTotal();
                });
            }
        });

        $('#type-of-service').change(handleTypeOfServiceChange);
        // $('.apply-discount-button').click(applyDiscountCode);
    };

    setupEventListeners();

    // Set initial values
    $('#service').val(service || "Studio or 1 Bedroom");
    $('#bathroom').val(bathroom || "1 Bathroom");
    $('#storey').val("Single storey home");
    $('#type-of-service').val("General Cleaning");
    calculateTotal();



    // Initialize Stripe
    // var stripe = Stripe('pk_test_51PylzqRq0gWoIKN4CJpBWQP5AOiDUYAUZ8V4bsG2vKKRRWYO3j1eD90VYwpGhWstTlz3fJRDPifKUzvSJpIIWF4B00Wl8MLfdK'); // Replace with your Stripe public key
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create a card element without the ZIP/postal code field
    var card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });
    card.mount('#card-element');

    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // for blur validate and input valid
    let allFieldsValid = true;
    // Define the validation functions
    function validatePhoneNumber(phoneNumber) {
        // const phoneRegex = /^(\+8801|01)[3-9]\d{8}$/;
        const phoneRegex = /^\d+$/;
        return phoneRegex.test(phoneNumber);
    }

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    function validateFutureDate(dateString) {
        // Assuming dateString is in YYYY-MM-DD format
        const inputDate = new Date(dateString);
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Set hours to 00:00:00 to compare dates without time

        return inputDate >= today;
    }

    // Define fields and their validations
    const fields = [
        { id: '#first-name', name: 'firstName' },
        { id: '#last-name', name: 'lastName' },
        { id: '#email', name: 'email', validate: validateEmail },
        { id: '#phone', name: 'phone', validate: validatePhoneNumber },
        { id: '#street', name: 'street' },
        { id: '#city', name: 'city' },
        { id: '#postal-code', name: 'postal-code' },
        { id: '#day', name: 'day', validate: validateFutureDate },
        { id: '#time', name: 'time' },
    ];
    function validateField(field) {
        const value = $(field.id).val().trim();
        const errorElement = $(`${field.id}-error`);

        if (!value) {
            allFieldsValid = false;
            errorElement.text(`The ${field.name} field is required.`);
            errorElement.stop(true, true).slideDown(); // Show the error message with sliding effect
        } else if (field.validate) {
            // Perform specific validation if provided
            const isValid = field.validate(value);
            if (!isValid) {
                allFieldsValid = false;
                errorElement.text(`The ${field.name} is not valid.`);
                errorElement.stop(true, true).slideDown(); // Show the error message with sliding effect
            } else {
                errorElement.stop(true, true).slideUp(); // Hide the error message with sliding effect
            }
        } else {
            errorElement.stop(true, true).slideUp(); // Hide the error message with sliding effect
        }
    }

    // Add event listeners for each field
    fields.forEach(field => {
        $(field.id).on('input blur change', function () {
            validateField(field);
        });
    });
    $('input[name="frequency"]').on('change', function () {
        // Hide the error message when an option is selected
        $('#error-message').hide();
    });

    // this is for organization

    let count = 0; // Initialize the counter

    // Increase counter
    $("#organisation-addon .increase").click(function () {
        count++;
        $("#organisation-counter").text(count);
    });

    // Decrease counter
    $("#organisation-addon .decrease").click(function () {
        if (count > 0) {
            count--;
            $("#organisation-counter").text(count);
        }
    });


    // end orga 

    $('#complete-booking-button').click(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Initial log for count
        console.log('final', count);
        // Clear previous error messages
        $('.error-message').text('');

        // Initialize a flag to check if all fields are valid
        allFieldsValid = true; // Reset validation status
        fields.forEach(field => {
            validateField(field);
        });
        if ($('input[name="frequency"]:checked').length === 0) {
            // Show error message if none is selected
            $('#error-message').show();
        };
        let typeOfService = $('#type-of-service').val();
        if (typeOfService === 'Organisation by the Hour') {
            if (count === 0) {
                alert('Please select "Organisation by the Hour $80/2 hours" quantity.');
                allFieldsValid = false; // No hours selected
            }
            else {
                allFieldsValid = true;
            }
        }


        if (allFieldsValid) {
            $('.loader').show();
            // Recalculate the total to ensure it's up to date
            calculateTotal();
            // Calculate the total extras amount

            $('.card-error-new').hide();
            let extrasTotal = 0;
            $('.extra-item.highlighted').each(function () {
                const price = parseFloat($(this).data('price'));
                const count = parseInt($(this).find('.counter').text()) || 1; // Default to 1 if no counter text
                extrasTotal += price * count;
            });

            // Get the final total value from the input or text element
            let discountAmount = parseFloat($('#total-price-2').val());
            let couponDiscountAmount = parseFloat($('#total-price-3').val());
            console.log(couponDiscountAmount);
            let finalTotal = parseFloat($('#total-price-input').val());
            const frequency = $('input[name="frequency"]:checked').val();

            // Define frequency discounts
            const frequencyDiscounts = {
                "Weekly": 0.15,
                "Fortnightly": 0.10,
                "Monthly": 0.05,
                "One-time": 0,
            };
            // Calculate discount based on frequency
            const discountPercentage = frequencyDiscounts[frequency] || 0;
            // Update the frequency discount display
            if (discountPercentage > 0) {
                $('#frequency-discount').text(`-$${discountAmount.toFixed(2)}`);
            } else {
                $('#frequency-discount').text('');
            }
            stripe.createToken(card).then(result => {
                if (result.error) {
                    $('.loader').hide();
                } else {

                    $('.loader').show();
                    // Send the token and booking data to the server
                    if (typeOfService === 'Organisation by the Hour') {
                        // Initial log for count
                        let extrasTotal2 = $('.extras-total').text();

                        // Remove the dollar sign and convert to a number
                        extrasTotal2 = parseFloat(extrasTotal2.replace(/[$,]/g, ''));
                        const bookingData = {
                            firstName: $('#first-name').val(),
                            lastName: $('#last-name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            street: $('#street').val(),
                            apt: $('#apt').val(),
                            city: $('#city').val(),
                            postalCode: $('#postal-code').val(),
                            service: $('#service').val(),
                            bathroom: $('#bathroom').val(),
                            typeOfService: $('#type-of-service').val(),
                            storey: $('#storey').val(),
                            frequency: frequency,
                            day: $('#day').val(),
                            time: $('#time').val(),
                            discountPercentage: discountPercentage * 100, // Convert to percentage
                            ...(discountAmount ? { discountAmount: discountAmount } : {}), // Include discount amount
                            ...(couponDiscountAmount ? { couponDiscountAmount: couponDiscountAmount } : {}), // Include discount amount
                            extras : window.extrasObject = {
                                "Organisation By the Hour": { "price": count }, // Ensure 'count' is defined
                                "Oven Cleaning": { "price": 0 },
                                "Refrigerator Cleaning Empty": { "price": 0 },
                                "Refrigerator Cleaning Full": { "price": 0 },
                                "Dishwasher Cleaning": { "price": 0 },
                                "Inside Cupboards Empty": { "price": 0 },
                                "Window Cleaning": { "price": 0 },
                                "Sliding Door Window": { "price": 0 },
                                "Blind Cleaning": { "price": 0 },
                                "High Dusting": { "price": 0 },
                                "Garage Cleaning": { "price": 0 },
                                "Balcony Cleaning Small": { "price": 0 },
                                "Balcony Cleaning Large": { "price": 0 },
                                "Change Sheets": { "price": 0 },
                                "Shed/Pool House": { "price": 0 },
                                "I Have Pets": { "price": 0 },
                                "This is a hourly service show extra Price": { "price": 0 },
                            },  
                            totalExtras: extrasTotal2, // Include total extras in the data
                            finalTotal: finalTotal,
                            stripeToken: result.token.id // Include the Stripe token
                        };
                        console.log(bookingData);
                        $.ajax({
                            url: '/booking/store',
                            method: 'POST',
                            data: bookingData,
                            success: function (response) {
                                console.log('Booking successful:', response);
                                $('#payment-form')[0].reset();
                                card.clear();
                                setTimeout(() => {
                                    $('.loader').hide();
                                    $('.booking-page.extra-item').removeClass('highlighted');
                                    toastr.success('booking success!');
                                    // window.location.href = '/';
                                }, 500);
                            },
                            error: function (xhr) {
                                $('.loader').hide();
                                // console.error('Booking failed:', xhr.responseText);
                                toastr.error('Booking failed because email already exists.');
                            }
                        });
                    }
                    else {
                        const bookingData = {
                            firstName: $('#first-name').val(),
                            lastName: $('#last-name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            street: $('#street').val(),
                            apt: $('#apt').val(),
                            city: $('#city').val(),
                            postalCode: $('#postal-code').val(),
                            service: $('#service').val(),
                            bathroom: $('#bathroom').val(),
                            typeOfService: $('#type-of-service').val(),
                            storey: $('#storey').val(),
                            frequency: frequency,
                            day: $('#day').val(),
                            time: $('#time').val(),
                            discountPercentage: discountPercentage * 100, // Convert to percentage
                            ...(discountAmount ? { discountAmount: discountAmount } : {}), // Include discount amount
                            ...(couponDiscountAmount ? { couponDiscountAmount: couponDiscountAmount } : {}), // Include discount amount
                            extras: window.extrasObject,
                            totalExtras: extrasTotal.toFixed(2), // Include total extras in the data
                            finalTotal: finalTotal,
                            stripeToken: result.token.id // Include the Stripe token
                        };
                        $.ajax({
                            url: '/booking/store',
                            method: 'POST',
                            data: bookingData,
                            success: function (response) {
                                console.log('Booking successful:', response);
                                $('#payment-form')[0].reset();
                                card.clear();
                                setTimeout(() => {
                                    $('.loader').hide();
                                    toastr.success('booking success!');
                                    // window.location.href = '/';
                                    $('.booking-page.extra-item').removeClass('highlighted');
                                }, 500);
                            },
                            error: function (xhr) {
                                $('.loader').hide();
                                // console.error('Booking failed:', xhr.responseText);
                                toastr.error('Booking failed because email already exists.');
                            }
                        });

                    }
                }
            });
            // Prepare the data to be sent to the server
        } else {
            console.log("Please fill all the field");
            const scrollPosition = document.documentElement.scrollHeight * 0;
            $('.card-error-new').show();
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            });
        }
        $('.card-close').click(function () {
            $('.card-error-new').hide();
        })
    });
    // for question look
    $('.question-item h3').on('click', function () {
        var $icon = $(this).find('.toggle-icon');
        var $content = $(this).next();

        if ($content.is(':visible')) {
            // Hide the content and change the icon to '+'
            $content.slideUp(300); // Optional: for smooth transition
            $icon.text('+');
        } else {
            // Show the content and change the icon to '-'
            $content.slideDown(300); // Optional: for smooth transition
            $icon.text('-');
        }
    });
});

