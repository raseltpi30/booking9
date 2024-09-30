@extends('layouts.admin')
@section('title')
Customer
@endsection
@section('admin_content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Booking List</h4>
                        <!-- Trigger Button -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Booking Freequency</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Final Amount</th>
                                        <th>Order Placed Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->firstName . ' ' . $item->lastName }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ ($item->street ?? '') . ', ' . ($item->apt ?? '') . ', ' . ($item->city
                                            ?? '') }}</td>
                                        <td>{{ $item->frequency }}</td>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->time }}</td>
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
                                        <td>{{'$'.$item->finalTotal}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</td>
                                        <td>
                                            <a href="{{ route('customer.details', $item->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('customer.delete', $item->id) }}"
                                                class="btn btn-danger btn-sm" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer Cleaning Status</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_body">

            </div>
        </div>
    </div>
</div>

<script src="{{asset('backend')}}/dist/js/ajax.js"></script>
<script>
    $('body').on('click','.edit', function(){
        // alert('click');
    let id=$(this).data('id');
    $.get("customer/edit/"+id, function(data){
        $("#modal_body").html(data);
    });
  });
</script>
@endsection