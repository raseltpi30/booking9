<?php  
namespace App\Console\Commands;

use App\Services\BookingService;
use Illuminate\Console\Command;

class CreateBookingsCommand extends Command
{
    protected $signature = 'bookings:create-weekly-and-monthly';
    protected $description = 'Create weekly and monthly bookings';

    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        parent::__construct();
        $this->bookingService = $bookingService;
    }

    public function handle()
    {
        $this->bookingService->createWeeklyAndMonthlyBookings();
        $this->info('Weekly and monthly bookings created successfully.');
    }
}
