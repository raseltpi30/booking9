<?php

namespace App\Providers;

use App\Services\BookingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Automatically create weekly bookings when the application boots
        $bookingService = new BookingService();
        $bookingService->createWeeklyAndMonthlyBookings();
    }

    public function register()
    {
        //
    }
}