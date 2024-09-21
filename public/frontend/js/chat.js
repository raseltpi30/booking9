$(document).ready(function () {
    console.log('DOM fully loaded and parsed');
    $('#total-price-3').val(''); // Refresh coupon input

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
    const servicePrices = { /* Your service prices here */ };
    const endOfLeaseServicePrices = { /* Your end of lease prices here */ };
    const bathroomPrices = { /* Your bathroom prices here */ };
    const storeyPrices = { /* Your storey prices here */ };
    const typeOfServicePrices = { /* Your type of service prices here */ };
    const frequencyDiscounts = { /* Your frequency discounts here */ };
    const freeAddOns = { /* Your free add-ons here */ };

    let discountCode = '';
    let discountAmount = 0;

    const disableAllFields = () => {
        $('input, select').prop('disabled', true);
    };

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
        $('#service-cost').text(`$${total.toFixed(2)}`);

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
            $('#frequency-discount').text(`-$${frequencyDiscountAmount.toFixed(2)}`);
        } else {
            $('#frequency-discount').text('');
        }

        $('.apply-discount-button').on('click', function () {
            const discountCode = $('#discount-code').val();

            if (discountCode === '') {
                $('#discount-code-error').text('Please enter a valid coupon code.');
                return;
            } else {
                $.ajax({
                    url: '/check-coupon',
                    type: 'POST',
                    data: {
                        couponCode: discountCode,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        let discountAmount = 0;
                        if (data.success) {
                            $('#discount-code-error').hide();
                            discountAmount = total * (data.discount_percent / 100);
                            $('#discount-amount').text(`Discount (${data.discount_percent}%): -$${discountAmount.toFixed(2)}`);
                            $('#total-price-3').val(discountAmount.toFixed(2));
                            const successMessage = `${data.message} Discount amount: <span style="color: black;">-$${discountAmount.toFixed(2)}</span>.`;
                            $('#discount-code-success').html(successMessage);
                            disableAllFields(); // Disable all fields after successful coupon application
                        } else {
                            $('#discount-amount').text('');
                            $('#discount-code-error').text(data.message);
                        }

                        total -= discountAmount;
                        $('#total').text(`$${total.toFixed(2)}`);
                        $('#total-price-input').val(total.toFixed(2));
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
        window.extrasObject = extrasObject;
    };

    // Remaining code...

    setupEventListeners();
    $('#service').val(service || "Studio or 1 Bedroom");
    $('#bathroom').val(bathroom || "1 Bathroom");
    $('#storey').val("Single storey home");
    $('#type-of-service').val("General Cleaning");
    calculateTotal();
    
    // Initialize Stripe and other functionalities...

    // Validation and other event listeners...

});
