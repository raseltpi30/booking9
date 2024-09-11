$(document).ready(function() {
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

    // Price and extras data
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

        const selectedExtras = $('.extra-item.highlighted');
        const extrasList = $('#selected-extras').empty();
        const extraCounts = {};

        selectedExtras.each(function() {
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

            const $listItem = $('<li>').text(item.count > 1 ? `${label} x${item.count}` : `${label}`);
            extrasList.append($listItem);
        });

        $('#extras-total').text(`$${extrasTotal.toFixed(2)}`);
        console.log('Total after extras:', total);

        const frequencyDiscount = $('input[name="frequency"]:checked').val();
        if (frequencyDiscount) {
            const discount = frequencyDiscounts[frequencyDiscount];
            const frequencyDiscountAmount = total * discount;
            total -= frequencyDiscountAmount;
            $('#frequency-discount').text(`Frequency Discount: -$${frequencyDiscountAmount.toFixed(2)}`);

            console.log('total for freequency:',total);
        } else {
            $('#frequency-discount').text('');
        }

        if (discountCode === 'WELCOME10%') {
            discountAmount = total * 0.10;
            $('#discount-amount').text(`Discount (10%): -$${discountAmount.toFixed(2)}`);
        } else {
            discountAmount = 0;
            $('#discount-amount').text('');
        }

        total -= discountAmount;
        $('#total').text(total.toFixed(2));
        $('#total-price-input').val(total.toFixed(2));
        console.log('discount total:',total);
    };

    const applyDiscountCode = () => {
        console.log('Apply Code button clicked');
        const inputCode = $('.discount-code-input').val().trim().toUpperCase();
        console.log('Entered Discount Code:', inputCode);
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

        $('.extra-item').each(function() {
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

        $('.extra-item').each(function() {
            const $extra = $(this);

            if ($extra.hasClass('walls-interior-windows')) {
                const $counter = $extra.find('.counter');
                let count = parseInt($counter.text()) || 0;

                const $increaseButton = $extra.find('.increase');
                const $decreaseButton = $extra.find('.decrease');

                $increaseButton.click(function(event) {
                    event.stopPropagation();
                    count++;
                    $counter.text(count);
                    $extra.addClass('highlighted');
                    $decreaseButton.css('pointer-events', count > 0 ? 'auto' : 'none');
                    calculateTotal();
                });

                $decreaseButton.click(function(event) {
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
                $extra.click(function() {
                    $(this).toggleClass('highlighted');
                    calculateTotal();
                });
            }
        });

        $('#type-of-service').change(handleTypeOfServiceChange);
        $('.apply-discount-button').click(applyDiscountCode);

        $('#complete-booking-button').click(function(event) {
            event.preventDefault();
            console.log('Complete Booking button clicked');

            const typeOfService = $('#type-of-service').val();
            const $organisationAddon = $('.extra-item[data-price="80"]');
            const $organisationCounter = $organisationAddon.find('.counter');

            if (typeOfService === 'Organisation by the Hour' && (!$organisationAddon.hasClass('highlighted') || !$organisationCounter.text() || parseInt($organisationCounter.text()) < 1)) {
                alert('Please select "Organisation by the Hour $80/2 hours" quantity.');
                return;
            }
        });
    };

    setupEventListeners();

    // Set initial values
    $('#service').val(service || "Studio or 1 Bedroom");
    $('#bathroom').val(bathroom || "1 Bathroom");
    $('#storey').val("Single storey home");
    $('#type-of-service').val("General Cleaning");
    calculateTotal();
});



