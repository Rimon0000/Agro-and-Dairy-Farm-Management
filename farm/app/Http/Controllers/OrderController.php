<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductDetails;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function orderDetailsAll()
    {
        # code...
        $orders = Order::latest()->paginate(5);

        return view('admin.orders.order_show', compact('orders'));
    }


    public function orderStore(Request $request)
    {
        // check session user id
        if (session()->has('user_id')) {

            // check user got anything in the cart
            $cartCheck = DB::table('carts')
                ->where('user_id', '=', session()->get('user_id'))->count();


            // if got anything
            if ($cartCheck > 0) {

                if ($request->coupon_price == 0) {
                    $total_price = $request->final_price;
                } else {
                    $total_price = $request->coupon_price;
                }

                // Save the order details in the order table
                $orderSave = new Order;
                $orderSave->user_id        = session()->get('user_id');
                $orderSave->user_name      = $request->user_name;
                $orderSave->user_number    = $request->user_number;
                $orderSave->user_email     = $request->user_email;
                $orderSave->pyt_method     = $request->pyt_method;
                $orderSave->address        = $request->address;
                $orderSave->street         = $request->street;
                $orderSave->city           = $request->city;
                $orderSave->country        = "Bangladesh";
                $orderSave->pin_code       = $request->pin_code;
                $orderSave->street         = $request->street;
                $orderSave->total_products = $request->user_list;
                $orderSave->total_price    = $total_price;
                $orderSave->pty_number     = $request->pty_number;
                $orderSave->trdx           = $request->trdx;
                $done = $orderSave->save();

                if ($done) {

                    // bring the customer 
                    $customer = DB::table('registers')->where('user_id', '=', session()->get('user_id'))->get(['user_status']);

                    $points = (int) $customer[0]->user_status;

                    // check the total price
                    if ($total_price >= 100 && $total_price <= 300) {
                        $points = (int) $customer[0]->user_status + 10;
                    } elseif ($total_price >= 301 && $total_price <= 500) {
                        $points = (int) $customer[0]->user_status + 100;
                    } elseif ($total_price > 1000) {
                        $points = (int) $customer[0]->user_status + 500;
                    }

                    // update the points of the users
                    DB::table('registers')
                        ->where('user_id', session()->get('user_id'))
                        ->update(['user_status' => $points]);

                    // #####################################################################################
                    $cartDetails = DB::table('carts')
                        ->where('user_id', '=', session()->get('user_id'))->get();

                    for ($i = 0; $i < count($cartDetails); $i++) {
                        # code...
                        $onumber = $cartDetails[$i]->product_qty;
                        $cartDetails[$i]->product_id;


                        $product_details = DB::table('product_details')
                            ->where('product_id', $cartDetails[$i]->product_id)->get();

                        if($onumber > $product_details[0]->stock_qty ){
                            return Redirect()->back()->with('warning', 'Order Qty can not be more than '.$product_details[0]->stock_qty.'');
                        }else{
                            $uty = ($product_details[0]->stock_qty - $onumber);
                            $product_id = $cartDetails[$i]->product_id;

                            DB::table('product_details')
                                ->where('product_id', $product_id)
                                ->update(['stock_qty' => $uty]);
                        }

                    }

                    // delete items from cart
                    DB::table('carts')->where('user_id', '=', session()->get('user_id'))->delete();
                } else {
                    return Redirect()->back()->with('success', 'Something went wrong.');
                }

                return Redirect()->back()->with('success', 'Order Placed Successfully.');
            } else {
                return redirect('/registration');
            }
        } else {
            return redirect('/registration');
        }
    }

    public function orderDetails()
    {
        # code...

        if (session()->has('user_id')) {

            $allCarts = DB::table('orders')->where('user_id', '=', session()->get('user_id'))->get();

            $data = [];

            foreach ($allCarts as $allCart) {
                $newProductCodes = explode(',', $allCart->total_products);

                if (count($newProductCodes) > 1) {
                    foreach ($newProductCodes as $newProductCode) {
                        $productCodes = DB::table('product_details')->where('product_id', '=', $newProductCode)->get();
                        // var_dump($allCart);
                        array_push($data, $productCodes);
                    }
                } else {
                    $productCodes = DB::table('product_details')->where('product_id', '=', $newProductCodes)->get();
                    // var_dump($allCart);
                    array_push($data, $productCodes);
                }
            }

            return view('frontend.orderDetails', compact('allCarts', 'data'));
        } else {
            return redirect('/registration');
        }
    }
}
