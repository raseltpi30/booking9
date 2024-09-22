<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCouponController extends Controller
{
    public function index()
    {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.index', compact('coupon'));
    }
    public function store(Request $request)
    {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['valid_date'] = $request->valid_date;
        $data['discountPercent'] = $request->coupon_percentage;
        $data['status'] = $request->status;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('coupons')->insert($data);
        $notification = array('message' => 'Coupon Created Successfully!', 'alert-type' => 'success');
        return redirect()->route('coupon.index')->with($notification);
    }
    public function edit($id)
    {
        $item = DB::table('coupons')->where('id',$id)->first();

        // return $item->coupon;
        return view('admin.coupon.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        $data = [
            'coupon' => $request->coupon,
            'valid_date' => $request->valid_date,
            'discountPercent' => $request->coupon_percentage,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        // Update the coupon in the database
        DB::table('coupons')->where('id', $id)->update($data);
        $notification = array('message' => 'Coupon Updated Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        $notification = array('message' => 'Coupon Deleted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
