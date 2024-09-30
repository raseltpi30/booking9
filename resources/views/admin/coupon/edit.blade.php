<form action="{{ route('coupon.update',$item->id) }}" method="Post" id="add-form">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="coupon">Coupon Code</label>
            <input type="text" id="coupon" class="form-control" value="{{$item->coupon}}" name="coupon" required="" placeholder="Coupon Code">
        </div>
        <div class="form-group">
            <label for="coupon_percentage">Coupon Percentage</label>
            <input type="text" id="coupon_percentage" value="{{$item->discountPercent}}" class="form-control" name="coupon_percentage" required=""
                placeholder="Coupon Percentage">
        </div>
        <div class="form-group">
            <label for="valid_date">Valid Date</label>
            <input type="date" id="valid_date" class="form-control" name="valid_date" required=""
                placeholder="valid_date" value="{{$item->valid_date}}">
        </div>
        <div class="form-group">
            <label for="status">Coupon Status</label>
            <select name="status" class="form-control" id="status">
                <option value="1" @if ($item->status == 1) selected @endif>Active</option>
                <option value="0" @if ($item->status == 0) selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="loading d-none"> Loading....</span>
            Submit</button>
    </div>
</form>