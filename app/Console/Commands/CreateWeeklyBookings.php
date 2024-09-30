<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CreateWeeklyBookings extends Command
{
    protected $signature = 'bookings:create-weekly';
    protected $description = 'Automatically create weekly bookings for users';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $bookings = Booking::where('frequency', 'Weekly')
            ->where('status', 'processing') // Changed to 'active' for processing
            ->get();

        foreach ($bookings as $booking) {
            if (Carbon::parse($booking->day) <= $today) {
                $newDate = Carbon::parse($booking->day)->addWeek()->format('Y-m-d');
                
                // Ensure a booking with the new date does not already exist
                if (!Booking::where('day', $newDate)->exists()) {
                    Booking::create([
                        'firstName' => $booking->firstName,
                        'lastName' => $booking->lastName,
                        'email' => $booking->email,
                        'phone' => $booking->phone,
                        'street' => $booking->street,
                        'apt' => $booking->apt,
                        'city' => $booking->city,
                        'postal_code' => $booking->postal_code,
                        'service' => $booking->service,
                        'bathroom' => $booking->bathroom,
                        'typeOfService' => $booking->typeOfService,
                        'storey' => $booking->storey,
                        'frequency' => 'Weekly', // Set to 'weekly' for new booking
                        'day' => $newDate, // Corrected single dollar sign
                        'time' => $booking->time,
                        'extras' => $booking->extras,
                        'discountPercentage' => $booking->discountPercentage,
                        'discountAmount' => $booking->discountAmount,
                        'couponDiscountAmount' => $booking->couponDiscountAmount,
                        'totalExtras' => $booking->totalExtras,
                        'finalTotal' => $booking->finalTotal,
                        'status' => 'processing', // Set status to 'processing'
                    ]);

                    // Optionally mark the old booking as 'completed'
                    $booking->update(['status' => 'completed']);
                }
            }
        }
    }
}
