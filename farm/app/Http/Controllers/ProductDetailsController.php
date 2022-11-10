<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{

    // Frontend


    public function ProductAll()
    {
        $productDetails = ProductDetails::all();
        return view('frontend.dairyProduct', compact('productDetails',));
    }

    public function ProductDetails($id)
    {
        # code...        
        $productDetails = ProductDetails::find($id);

        return view('frontend.dairyProductDetails', compact('productDetails'));
    }




    // Admin
    public function AllProduct()
    {
        $productDetails = ProductDetails::all();
        $categories     = Category::all();
        $subcategories  = SubCategory::all();
        return view('admin.productdetails.product_show', compact('productDetails', 'categories', 'subcategories'));
    }

    public function AllAdd()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.productdetails.product_add', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request)
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




        $productDetails = new ProductDetails;
        $productDetails->product_id           = $request->product_id;
        $productDetails->product_name         = $request->product_name;
        $productDetails->weight               = $request->weight;
        $productDetails->cost_price           = $request->cost_price;
        $productDetails->size                 = $request->size;
        $productDetails->stock_qty            = $request->stock_qty;
        $productDetails->stock_alert          = $request->stock_alert;
        $productDetails->sale_price           = $request->sale_price;
        $productDetails->discount_price       = $request->discount_price;
        $productDetails->product_detail_short = $request->product_detail_short;
        $productDetails->product_detail_long  = $request->product_detail_long;
        $productDetails->category_id          = $request->category_id;
        $productDetails->subcategory_id       = $request->subcategory_id;
        $productDetails->default_img          = "/image/default/default-image.png";

        ###########################################################################
        $image_1     = $request->file('product_image_1');
        $image_ext_1 = strtolower($image_1->getClientOriginalExtension());
        $image_gen_1 = hexdec(uniqid());
        $image_new_1 = $image_gen_1 . '.' . $image_ext_1;

        $upload_to   = 'image/product/';
        $image_new_db_1 = $upload_to . $image_new_1;
        $image_1->move($upload_to, $image_new_1);

        $productDetails->product_img_1 = $image_new_db_1;
        ###########################################################################


        ###########################################################################
        $image_2     = $request->file('product_image_2');
        $image_ext_2 = strtolower($image_2->getClientOriginalExtension());
        $image_gen_2 = hexdec(uniqid());
        $image_new_2 = $image_gen_2 . '.' . $image_ext_2;

        $upload_to   = 'image/product/';
        $image_new_db_2 = $upload_to . $image_new_2;
        $image_2->move($upload_to, $image_new_2);

        $productDetails->product_img_2 = $image_new_db_2;
        ###########################################################################

        ###########################################################################
        $image_3     = $request->file('product_image_3');
        $image_ext_3 = strtolower($image_3->getClientOriginalExtension());
        $image_gen_3 = hexdec(uniqid());
        $image_new_3 = $image_gen_3 . '.' . $image_ext_3;

        $upload_to   = 'image/product/';
        $image_new_db_3 = $upload_to . $image_new_3;
        $image_3->move($upload_to, $image_new_3);

        $productDetails->product_img_3 = $image_new_db_3;
        ###########################################################################

        ###########################################################################
        // $image_4     = $request->file('product_image_4');
        // $image_ext_4 = strtolower($image_4->getClientOriginalExtension());
        // $image_gen_4 = hexdec(uniqid());
        // $image_new_4 = $image_gen_4 . '.' . $image_ext_4;

        // $upload_to   = 'image/product/';
        // $image_new_db_4 = $upload_to . $image_new_4;
        // $image_4->move($upload_to, $image_new_4);

        // $productDetails->product_img_4 = $image_new_db_4;
        ###########################################################################








        // $productDetails->product_img_2        = $request->product_img_2;
        // $productDetails->product_img_3        = $request->product_img_3;
        // $productDetails->product_img_4        = $request->product_img_4;

        // $productDetails->product_img_alt_1    = $request->product_img_alt_1;
        // $productDetails->product_img_alt_2    = $request->product_img_alt_2;
        // $productDetails->product_img_alt_3    = $request->product_img_alt_3;
        // $productDetails->product_img_alt_4    = $request->product_img_alt_4;

        $productDetails->user_id = Auth::user()->id;
        $productDetails->save();

        return Redirect()->back()->with('success', 'Product Details Inserted Successfully.');
    }

    public function EditProduct($id)
    {
        # code...        
        $productDetails = productDetails::find($id);

        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.productdetails.product_edit', compact('productDetails', 'categories', 'subcategories'));
    }


    public function UpdateProduct(Request $request, $id)
    {
        # code...

        $product_id           = $request->product_id;
        $product_name         = $request->product_name;
        $weight               = $request->weight;
        $size                 = $request->size;
        $cost_price           = $request->cost_price;
        $sale_price           = $request->sale_price;
        $discount_price       = $request->discount_price;
        $stock_qty            = $request->stock_qty;
        $stock_alert          = $request->stock_alert;
        $category_id          = $request->category_id;
        $subcategory_id       = $request->subcategory_id;
        $product_detail_short = $request->product_detail_short;
        $product_detail_long  = $request->product_detail_long;

        DB::table('product_details')
            ->where('id', $id)
            ->update([

                'product_id'           => $product_id,
                'product_name'         => $product_name,
                'weight'               => $weight,
                'size'                 => $size,
                'cost_price'           => $cost_price,
                'sale_price'           => $sale_price,
                'discount_price'       => $discount_price,
                'stock_qty'            => $stock_qty,
                'stock_alert'          => $stock_alert,
                'subcategory_id'       => $subcategory_id,
                'product_detail_short' => $product_detail_short,
                'product_detail_long'  => $product_detail_long,
                'category_id'          => $category_id,
                'subcategory_id'       => $subcategory_id,
                'user_id'              => Auth::user()->id,
                'updated_at'           => Carbon::now()
            ]);

        return Redirect()->route('product.all')->with('success', 'Product Details Updated Successfully.');
    }

    public function DeleteProduct($id)
    {

        DB::table('product_details')->where('id', '=', $id)->delete();

        return Redirect()->route('product.all')->with('success', 'Product Deleted Successfully.');
    }

    public function productReminder()
    {
        # code...
        $productDetails = productDetails::all();

        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.productdetails.product_reminder', compact('productDetails', 'categories', 'subcategories'));
    }

    public function productReminderUpdate(Request $request)
    {
        # code...
        $product_id           = $request->p_id;
        $stock_qty            = $request->p_amount;

        DB::table('product_details')
            ->where('product_id', $product_id)
            ->update([
                'stock_qty'  => $stock_qty,
                'user_id'    => Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);

        return Redirect()->back()->with('success', 'Product Amount Updated Successfully.');
    }
}
