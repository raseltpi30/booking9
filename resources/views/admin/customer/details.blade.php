@extends('layouts.admin')
@section('title')
Customer
@endsection
@section('admin_content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$item->firstName}} Details Here</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-right">Name :</th>
                                    <td>{{$item->firstName . ' ' . $item->lastName}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Email :</th>
                                    <td>{{$item->email}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Phone :</th>
                                    <td>{{$item->phone}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Address :</th>
                                    <td>{{ $item->street . ',' . $item->apt . ',' . $item->city }}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Postal Code :</th>
                                    <td>{{ $item->postal_code}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Service :</th>
                                    <td>{{ $item->service}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Bathroom :</th>
                                    <td>{{ $item->bathroom}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Service Type :</th>
                                    <td>{{ $item->typeOfService}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Storey :</th>
                                    <td>{{ $item->storey}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Cleaning Date :</th>
                                    <td>{{ $item->day}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Cleaning Time :</th>
                                    <td>{{ $item->time}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Freequency :</th>
                                    <td>{{ $item->frequency . ' ' . $item->discountPercentage . '%' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Freequency Discount Amount :</th>
                                    <td>{{'$'.$item->discountAmount}}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Coupon Discount Amount :</th>
                                    <td>{{ '$' . $item->couponDiscountAmount }}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Extras :</th>
                                    <td>
                                        @php
                                        // Decode the JSON from the 'extras' field
                                        $serviceData = json_decode($item->extras, true);
                                        @endphp

                                        @if (is_array($serviceData) && count($serviceData) > 0)
                                        <table>
                                            <tbody>
                                                @foreach ($serviceData as $service => $details)
                                                <tr>
                                                    <td>{{ $service }}</td>
                                                    <td>{{ $details['price'] ?? '0' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <p>No valid data found.</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($item->status == 'completed')
                                            <label class="badge badge-success">Completed</label>
                                        @elseif($item->status == 'processing')
                                            <label class="badge badge-warning">Processing</label>
                                        @elseif($item->status == 'canceled')
                                            <label class="badge badge-danger">Canceled</label>
                                        @else
                                            <label class="badge badge-info">Returned</label>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Extras :</th>
                                    <td>{{ '$' . $item->totalExtras }}</td>
                                </tr>
                                <tr>
                                    <th>Final Total Amount :</th>
                                    <td>{{ '$' . $item->finalTotal }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
@endsection