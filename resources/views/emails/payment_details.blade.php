<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
</head>
<body>
    <h1>Payment Details</h1>
    <p><strong>First Name:</strong> {{ $newData['firstName'] ?? 'N/A' }}</p>
    <p><strong>Last Name:</strong> {{ $newData['lastName'] ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $newData['email'] ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $newData['phone'] ?? 'N/A' }}</p>
    <p><strong>Street:</strong> {{ $newData['street'] ?? 'N/A' }}</p>
    <p><strong>Apt:</strong> {{ $newData['apt'] ?? 'N/A' }}</p>
    <p><strong>City:</strong> {{ $newData['city'] ?? 'N/A' }}</p>
    <p><strong>Postal Code:</strong> {{ $newData['postalCode'] ?? 'N/A' }}</p>
    <p><strong>Service:</strong> {{ $newData['service'] ?? 'N/A' }}</p>
    <p><strong>Bathroom:</strong> {{ $newData['bathroom'] ?? 'N/A' }}</p>
    <p><strong>Type of Service:</strong> {{ $newData['typeOfService'] ?? 'N/A' }}</p>
    <p><strong>Storey:</strong> {{ $newData['storey'] ?? 'N/A' }}</p>
    <p><strong>Frequency:</strong> {{ $newData['frequency'] ?? 'N/A' }}</p>
    <p><strong>Day:</strong> {{ $newData['day'] ?? 'N/A' }}</p>
    <p><strong>Time:</strong> {{ $newData['time'] ?? 'N/A' }}</p>
    <p><strong>Discount Percentage:</strong> {{ $newData['discountPercentage'] ?? '0%' }}</p>
    <p><strong>Discount Amount:</strong> ${{ number_format($newData['discountAmount'] ?? 0, 2) }}</p>
    <p><strong>Coupon Discount Amount:</strong> ${{ number_format($newData['couponDiscountAmount'] ?? 0, 2) }}</p>
    <p><strong>Extras:</strong> {{ json_encode($newData['extras'] ?? []) }}</p>
    <p><strong>Total Extras:</strong> ${{ number_format($newData['totalExtras'] ?? 0, 2) }}</p>
    <p><strong>Final Total:</strong> ${{ number_format($newData['finalTotal'] ?? 0, 2) }}</p>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$newData}}</p>
</body>
</html> --}}
