@extends('layouts.admin')

@section('title')
Dashboard
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('admin_content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class=" mt-4 first">
            <h1 class="mb-4">Admin Dashboard</h1>

            <div class="row">
                <!-- Dashboard Cards -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Total Bookings</h5>
                            <p class="card-text display-4">{{ $totalBookings }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Total Revenue</h5>
                            <p class="card-text display-4">${{ number_format($totalRevenue, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Total Customers</h5>
                            <p class="card-text display-4">{{ $totalCustomers }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-info">
                        <div class="card-body">
                            <h5 class="card-title text-info">Upcoming Bookings</h5>
                            <p class="card-text display-4">{{ $upcomingBookingsCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Bookings Table -->
            <div class="row mt-4 last">
                <div class="col-lg-12">
                    <h3 class="mb-4">Recent Bookings</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->firstName }} {{ $booking->lastName }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->service }}</td>
                                    <td>{{ $booking->day }}</td>
                                    <td>${{ number_format($booking->finalTotal, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="row mt-4 middle">
                <div class="col-lg-12">
                    <h3 class="mb-4">Revenue Overview by Month</h3>
                    <canvas id="bookingsChart"></canvas>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('bookingsChart').getContext('2d');

    const bookingsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Total Revenue',
                data: @json(array_values($fullYearRevenue)), // Full year revenue data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
                hoverBorderColor: 'rgba(75, 192, 192, 1)',
            }]
        },
       
    });
</script>


@endsection