<form action="{{route('customer.update',$item->id)}}" method="Post">
    @csrf
    <div class="modal-body">
        <h5 class="modal-title">Update Cleaning Status</h5>
        <div class="form-group">
            <label for="status" class="form-label">Customer Cleaning Status:</label>
            <select name="status" id="status" class="form-control" style="color: black">
                <option value="processing" @if ($item->status == 'processing') selected="" @endif>Processing</option>                
                <option value="returned" @if ($item->status == 'returned') selected="" @endif>Returned</option>
                <option value="canceled" @if ($item->status == 'canceled') selected="" @endif>Cancel</option>
                <option value="completed" @if ($item->status == 'completed') selected="" @endif>Completed</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            <span class="d-none" id="loadingText">Loading...</span>
            <span id="submitText">Submit</span>
        </button>
    </div>
</form>