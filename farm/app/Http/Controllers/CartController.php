<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductDetails;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class CartController extends Controller
{
    //
    public function cartAll()
    {
        $count    = DB::table('carts')->where('user_id', session()->get('user_id'))->count();
        
        if($count){
            $coupon_price = 0;
            $isEmpty = true;
            $allCarts    = DB::table('carts')->where('user_id', session()->get('user_id'))->get();
            $final_price = DB::table('carts')->where('user_id', session()->get('user_id'))->sum('total_price');
            return view('frontend.cart', compact('allCarts', 'final_price', 'isEmpty','coupon_price'));
        }else{
            $coupon_price = 0;
            $isEmpty = false;
            $allCarts    = DB::table('carts')->where('user_id', session()->get('user_id'))->get();
            $final_price = DB::table('carts')->where('user_id', session()->get('user_id'))->sum('total_price');
            return view('frontend.cart', compact('allCarts', 'final_price', 'isEmpty','coupon_price'));
        }
    }


    public function cartSave($id)
    {
        # code...


        if (session()->has('user_id')) {

            $productDetails = ProductDetails::find($id);
            $cartCheck      = DB::table('carts')
                ->where('product_id', '=', $productDetails->product_id)
                ->where('user_id', '=', session()->get('user_id'))
                ->count();


            if ($cartCheck > 0) {
                return Redirect()->back()->with('success', 'Item Already Exist.');
            } else {

                if ($productDetails->product_img_1 == NULL) {
                    $product_img = $productDetails->default_img;
                } else {
                    $product_img = $productDetails->product_img_1;
                }

                if (empty($productDetails->discount_price)) {
                    $product_price = $productDetails->sale_price;
                } else {
                    $product_price = $productDetails->discount_price;
                }

                $cartSave = new Cart;
                $cartSave->user_id        = session()->get('user_id');
                $cartSave->product_id     = $productDetails->product_id;
                $cartSave->product_name   = $productDetails->product_name;
                $cartSave->product_price  = $product_price;
                $cartSave->product_image  = $product_img;
                $cartSave->product_size   = $productDetails->size;
                $cartSave->product_weight = $productDetails->weight;
                $cartSave->total_price    = $product_price;
                $cartSave->product_qty    = 1;
                $cartSave->user_status    = $productDetails->user_status;
                $cartSave->save();

                return Redirect()->back()->with('success', 'Cart Inserted Successfully.');
            }
        } else {
            return redirect('/registration');
        }
    }

    public function cartStore(Request $request)
    {
        $updateTotal = ($request->product_price * $request->qty);

        DB::table('carts')
            ->where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->update(['product_qty' => $request->qty, 'total_price' => $updateTotal]);

        return Redirect()->back()->with('success', 'Updated Successfully.');
    }


    public function cartDelete($id)
    {

        DB::table('carts')->where('id', '=', $id)->delete();

        return Redirect()->back()->with('success', 'Item Deleted Successfully.');
    }
}
