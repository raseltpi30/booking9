<?php
if (!function_exists('greeting')) {
    function greeting()
    {
        date_default_timezone_set('Asia/Dhaka'); // Set timezone to Dhaka
        $hour = date('h'); // Get the current hour in 12-hour format
        $period = date('A'); // Get AM or PM

        if ($period === 'AM') {
            if ($hour < 12) { // Morning from 5 AM to 11:59 AM
                return "Good Morning";
            }
        } else { // PM
            if ($hour < 5) {
                return "Good Afternoon";
            } elseif ($hour < 9) {
                return "Good Evening"; // Evening from 5 PM to 9 PM
            } else {
                return "Good Night"; // Night starts at 10 PM
            }
        }

        // For hours 12 PM to 4 PM
        return "Good Afternoon";
    }
}
