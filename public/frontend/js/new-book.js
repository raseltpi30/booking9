$(document).ready(function () {
    console.log('DOM fully loaded and parsed');

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
    const servicePrices = { /* ... */ };
    const endOfLeaseServicePrices = { /* ... */ };
    const bathroomPrices = { /* ... */ };
    const storeyPrices = { /* ... */ };
    const typeOfServicePrices = { /* ... */ };
    const frequencyDiscounts = { /* ... */ };
    const freeAddOns = { /* ... */ };

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

        const selectedExtras = $('.extra-item.highlighted');
        const extrasList = $('#selected-extras').empty();
        const extraCounts = {};
        const extrasObject = {};

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

        $.each(extraCounts, (label, item) => {
            let itemTotal = item.price * item.count;

            if (freeAddOns[typeOfService] && freeAddOns[typeOfService].includes(label)) {
                itemTotal = 0;
            }

            total += itemTotal;
            extrasTotal += itemTotal;

            extrasObject[label] = { price: item.price };

            const $listItem = $('<li>').text(item.count > 1 ? `${label} x${item.count}` : `${label}`);
            extrasList.append($listItem);
        });

        $('#extras-total').text(`$${extrasTotal.toFixed(2)}`);

        const frequencyDiscount = $('input[name="frequency"]:checked').val();
        if (frequencyDiscount) {
            const discount = frequencyDiscounts[frequencyDiscount];
            const frequencyDiscountAmount = total * discount;
            total -= frequencyDiscountAmount;
            $('#frequency-discount').text(`Frequency Discount: -$${frequencyDiscountAmount.toFixed(2)}`);
            $('#total-price-2').val(frequencyDiscountAmount.toFixed(2));
        } else {
            $('#frequency-discount').text('');
        }

        if (discountCode === 'WELCOME10%') {
            discountAmount = total * 0.10;
            $('#discount-amount').text(`Discount (10%): -$${discountAmount.toFixed(2)}`);
            $('#total-price-3').val(discountAmount.toFixed(2));
        } else {
            discountAmount = 0;
            $('#discount-amount').text('');
        }

        total -= discountAmount;
        $('#total').text(total.toFixed(2));
        $('#total-price-input').val(total.toFixed(2));

        window.extrasObject = extrasObject;
    };

    const applyDiscountCode = () => {
        const inputCode = $('.discount-code-input').val().trim().toUpperCase();
        if (inputCode === 'WELCOME10%') {
            discountCode = inputCode;
            alert('Discount code applied successfully!');
        } else {
            discountCode = '';
            alert('Invalid discount code');
        }
        calculateTotal();
    };

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
                if (label === "Organisation By the Hour $80/2 hours") {
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
        $('.apply-discount-button').click(applyDiscountCode);
    };

    setupEventListeners();

    // Set initial values
    $('#service').val(service || "Studio or 1 Bedroom");
    $('#bathroom').val(bathroom || "1 Bathroom");
    $('#storey').val("Single storey home");
    $('#type-of-service').val("General Cleaning");
    calculateTotal();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $('#complete-booking-button').click(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate fields
        let allFieldsValid = true;
        if (allFieldsValid) {
            // Recalculate the total to ensure it's up to date
            calculateTotal();

            // Get the Stripe token and submit the payment
            stripe.createToken(card).then(result => {
                if (result.error) {
                    // Display error.message in your UI
                    alert('not right');
                } else {
                    // Send the token and booking data to the server
                    const bookingData = {
                        stripeToken: result.token.id // Include the Stripe token
                    };

                    console.log(bookingData);

                    // $.ajax({
                    //     url: '/booking/store',
                    //     method: 'POST',
                    //     data: bookingData,
                    //     success: function (response) {
                    //         console.log('Booking successful:', response);
                    //         alert('Booking completed successfully!');
                    //         // Optionally redirect to a confirmation page
                    //         window.location.href = '/confirmation'; // Adjust to your confirmation page
                    //     },
                    //     error: function (xhr) {
                    //         console.error('Booking failed:', xhr.responseText);
                    //         alert('An error occurred while completing the booking.');
                    //     }
                    // });
                }
            });
        } else {
            console.log("Please fill all the field");
            $('.card-error-new').show();
            window.scrollTo({
                top: document.documentElement.scrollHeight * 0,
                behavior: 'smooth'
            });
        }

        $('.card-close').click(function () {
            $('.card-error-new').hide();
        });
    });

    // Initialize Stripe
    var stripe = Stripe('pk_test_51Pg0xxIpCrzhTk3noCRQZEZezn6SM20Ihj5XxT9edh6t13AdAdc8R2DYGnVm2eq9CBW8q5831OefWCwQsO97XLzs00cjIlsJPV'); // Replace with your Stripe public key
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
});
