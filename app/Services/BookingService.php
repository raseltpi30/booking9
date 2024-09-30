<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingService
{
    public function createWeeklyAndMonthlyBookings()
    {
        $today = Carbon::now()->startOfDay();
        Log::info('Creating weekly and monthly bookings for date: ' . $today);

        // Handle weekly bookings
        $this->createWeeklyBookings($today);

        // Handle monthly bookings
        $this->createMonthlyBookings($today);
    }

    private function createWeeklyBookings($today)
    {
        Log::info('Creating weekly bookings.');

        $bookings = Booking::where('frequency', 'Weekly')
            ->where('status', 'processing')
            ->get();

        foreach ($bookings as $booking) {
            Log::info('Processing booking: ', $booking->toArray());

            if (Carbon::parse($booking->day) < $today) {
                $newDate = Carbon::parse($booking->day)->addWeek()->format('Y-m-d');

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
                        'frequency' => 'Weekly',
                        'day' => $newDate,
                        'time' => $booking->time,
                        'extras' => $booking->extras,
                        'discountPercentage' => $booking->discountPercentage,
                        'discountAmount' => $booking->discountAmount,
                        'couponDiscountAmount' => $booking->couponDiscountAmount,
                        'totalExtras' => $booking->totalExtras,
                        'finalTotal' => $booking->finalTotal,
                        'status' => 'processing',
                    ]);

                    Log::info('New weekly booking created for date: ' . $newDate);
                    $booking->update(['status' => 'completed']);
                } else {
                    Log::info('Booking already exists for date: ' . $newDate);
                }
            }
        }
    }

    private function createMonthlyBookings($today)
    {
        Log::info('Creating monthly bookings.');

        $bookings = Booking::where('frequency', 'Monthly')
            ->where('status', 'processing')
            ->get();

        foreach ($bookings as $booking) {
            Log::info('Processing booking: ', $booking->toArray());

            if (Carbon::parse($booking->day) < $today) {
                $newDate = Carbon::parse($booking->day)->addMonth()->format('Y-m-d');

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
                        'frequency' => 'Monthly',
                        'day' => $newDate,
                        'time' => $booking->time,
                        'extras' => $booking->extras,
                        'discountPercentage' => $booking->discountPercentage,
                        'discountAmount' => $booking->discountAmount,
                        'couponDiscountAmount' => $booking->couponDiscountAmount,
                        'totalExtras' => $booking->totalExtras,
                        'finalTotal' => $booking->finalTotal,
                        'status' => 'processing',
                    ]);

                    Log::info('New monthly booking created for date: ' . $newDate);
                    $booking->update(['status' => 'completed']);
                } else {
                    Log::info('Booking already exists for date: ' . $newDate);
                }
            }
        }
    }
}
