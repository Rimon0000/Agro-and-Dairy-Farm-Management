<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    //
    public function AllCoupon()
    {
        # code...
        $coupons = Coupon::latest()->paginate(5);
        return view('admin.coupon.coupon_show', compact('coupons'));
    }

    public function StoreCoupon(Request $request)
    {

        // $validated = $request->validate(
        //     [
        //         'category_name' => 'required|unique:categories|max:255',
        //         'category_image' => 'required|mimes:jpg,jpeg,png',
        //     ],
        //     [
        //         'category_name.required' => 'Pls Input Category Name.',
        //         'category_name.unique' => 'Input Category Name Already Exist.',
        //         'category_name.max' => 'Category Name Should Be Less Then 255 Chars.',

        //         'category_image.required' => 'Category Image Required.',

        //     ]
        // );


        $coupon = new Coupon;
        $coupon->title          = $request->title;
        $coupon->code           = $request->code;
        $coupon->discount_amt   = $request->discount_amt;
        $coupon->min_order_amt  = $request->min_order_amt;
        $coupon->user_status    = $request->user_status;
        $coupon->save();


        return Redirect()->back()->with('success', 'Coupon Details Inserted Successfully.');
    }


    public function EditCoupon($id)
    {

        $coupons = Coupon::find($id);
        return view('admin.coupon.coupon_edit', compact('coupons'));
    }

    public function UpdateCoupon(Request $request, $id)
    {

        $title         = $request->title;
        $code          = $request->code;
        $discount_amt  = $request->discount_amt;
        $min_order_amt = $request->min_order_amt;
        $user_status   = $request->user_status;

        DB::table('coupons')
            ->where('id', $id)
            ->update([
                'title'         => $title,
                'code'          => $code,
                'discount_amt'  => $discount_amt,
                'min_order_amt' => $min_order_amt,
                'user_status'   => $user_status,
                'updated_at'    => Carbon::now()
            ]);

        return Redirect()->route('coupon.all')->with('success', 'Coupon Updated Successfully.');
    }

    public function DeleteCoupon($id)
    {

        DB::table('coupons')->where('id', '=', $id)->delete();

        return Redirect()->route('coupon.all')->with('success', 'Coupon Deleted Successfully.');
    }


    // Frontend ///////////////////////////////////////////////////////////////////////////////
    public function ApplyCoupon(Request $request)
    {
        # code...


        $coupon_code = $request->coupon_code;

        $couponCheck = DB::table('coupons')
            ->where('code', '=', $coupon_code)
            ->where('status', '=', 0)
            ->count();

        if ($couponCheck > 0) {

            $final_price = DB::table('carts')->where('user_id', session()->get('user_id'))->sum('total_price');
            $coupons     = DB::table('coupons')->where('code', '=', $coupon_code)->where('status', '=', 0)->get(['min_order_amt', 'user_status', 'discount_amt']);

            if ($final_price > $coupons[0]->min_order_amt) {

                $user_status = DB::table('registers')->where('user_id', session()->get('user_id'))->get('user_status');

                if ($coupons[0]->user_status <= $user_status[0]->user_status) {

                    $final_price = DB::table('carts')->where('user_id', session()->get('user_id'))->sum('total_price');

                    $discount_amt = (int) $coupons[0]->discount_amt;
                    $discount_amt = ($discount_amt / 100);
                    $new_price    = $discount_amt * $final_price;
                    $coupon_price = round((int) $final_price - $new_price);

                    $upadtedData = DB::table('coupons')
                        ->where('code', '=', $coupon_code)
                        ->update(['user_id' => session()->get('user_id')]);

                    if ($upadtedData > 0) {
                        return Redirect()->back()->with('coupon_price', $coupon_price);
                    } else {
                        return Redirect()->back()->with('success', "Sry. Somthing went wrong.");
                    }
                } else {
                    return Redirect()->back()->with('success', "Sry. You're not qualified for this discount.");
                }
            } else {
                return Redirect()->back()->with('success', 'Minimum Shopping Price Should be more than ' . $coupons[0]->min_order_amt . ' TK');
            }
        } else {
            return Redirect()->back()->with('success', "Sry. Coupon code didn't match or expired.");
        }
    }
}
