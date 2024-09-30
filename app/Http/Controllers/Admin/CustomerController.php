<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('bookings')->get();
        return view('admin.customer.index', compact('customer'));
    }
    public function customerDetails($id)
    {
        $item = DB::table('bookings')->where('id', $id)->first();
        return view('admin.customer.details', compact('item'));
    }
    
    public function edit($id)
    {
        $item = DB::table('bookings')->where('id', $id)->first();
        // return $item->firstName;
        return view('admin.customer.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $booking = DB::table('bookings')->where('id', $id)->first();
        DB::table('bookings')->where('id', $id)->update(['status' => $request->status]);
        $notification = array('message' => 'Booking Status Updated Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        DB::table('bookings')->where('id', $id)->delete();
        $notification = array('message' => 'Booking Deleted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
