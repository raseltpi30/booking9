<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') || Crystal Clean Sydney</title>
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend') }}/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/styles.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/services.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/booking.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/responsive.css">
    {{-- for toastar --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.css') }}">

</head>

<body>
    @include('layouts.inc.header')
    <!-- main content start  -->
    @yield('main_content')
    <!-- main content end -->
    @include('layouts.inc.footer')
    <!-- footer end  -->
    @include('layouts.inc.script')
</body>

</html>