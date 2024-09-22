<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        // Fetch total bookings count
        $totalBookings = Booking::count();

        // Calculate total revenue (finalTotal after all discounts)
        $totalRevenue = Booking::sum('finalTotal');

        // Fetch total customers (assuming one customer per booking, count distinct emails)
        $totalCustomers = Booking::distinct('email')->count('email');

        // Fetch upcoming bookings (where day is in the future)
        $upcomingBookingsCount = Booking::where('day', '>', now()->format('Y-m-d'))->count();

        // Fetch revenue data grouped by month for the current year
        $revenueData = DB::table('bookings')
            ->selectRaw('MONTH(day) as month, SUM(finalTotal) as total')
            ->whereYear('day', date('Y')) // Filter for the current year
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Initialize revenue data for all 12 months
        $fullYearRevenue = array_fill(1, 12, 0);

        // Fill revenue data from the database
        foreach ($revenueData as $month => $total) {
            $fullYearRevenue[$month] = $total;
        }

        // Fetch recent bookings (with pagination)
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.home', compact(
            'totalBookings', 
            'totalRevenue', 
            'totalCustomers', 
            'upcomingBookingsCount', 
            'bookings', 
            'fullYearRevenue' // Pass full year revenue data to the view
        ));
    }
}
