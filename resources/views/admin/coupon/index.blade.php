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
                        <div class="button-new" style="display: flex;justify-content:space-between;align-items:center">
                            <h4 class="card-title">All Coupon List Here</h4>
                            <!-- Trigger Button -->
                            <button style="margin-right:50px" type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                <i class="fa fa-plus"></i>Add New Coupon
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Coupon Code</th>
                                        <th>Valid Date</th>
                                        <th>Coupon Discount %</th>
                                        <th>Status</th>
                                        <th>Coupon Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupon as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$item->coupon}}</td>
                                        <td>{{$item->valid_date}}</td>
                                        <td>{{$item->discountPercent.'%'}}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <label class="badge badge-success">Active</label>
                                            @else
                                            <label class="badge badge-danger">Inactive</label>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('coupon.delete', $item->id) }}"
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

{{-- coupon add modal --}}
{{-- Coupon insert modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('coupon.store') }}" method="Post" id="add-form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="coupon">Coupon Code</label>
                        <input type="text" id="coupon" class="form-control" name="coupon" required=""
                            placeholder="Coupon Code">
                    </div>
                    <div class="form-group">
                        <label for="coupon_percentage">Coupon Percentage</label>
                        <input type="text" id="coupon_percentage" class="form-control" name="coupon_percentage"
                            required="" placeholder="Coupon Percentage">
                    </div>
                    <div class="form-group">
                        <label for="valid_date">Valid Date</label>
                        <input type="date" id="valid_date" class="form-control" name="valid_date" required=""
                            placeholder="valid_date">
                    </div>
                    <div class="form-group">
                        <label for="status">Coupon Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary"> <span class="loading d-none"> Loading....</span>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Coupon Here</h5>
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
    // alert(id);
    $.get("coupon/edit/"+id, function(data){
        $("#modal_body").html(data);
    });
  });
</script>
@endsection