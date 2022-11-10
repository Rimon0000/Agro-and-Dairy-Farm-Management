<?php

namespace App\Http\Controllers;

use App\Models\AgroDetails;
use App\Models\Whatsapp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgroDetailsController extends Controller
{
    //

    // Frontend


    public function AgroAll()
    {
        $agroDetails = AgroDetails::all();
        return view('frontend.agro', compact('agroDetails',));
    }

    public function AgroDetails($id)
    {
        # code...        
        $agroDetails = AgroDetails::find($id);
        
        $Whatsapp = Whatsapp::first();

        return view('frontend.agoraProductDetails', compact('agroDetails', 'Whatsapp'));
    }


    // Admin

    public function AllAgro()
    {
        $agroDetails = AgroDetails::latest()->paginate(5);
        return view('admin.agrodetails.agro_show', compact('agroDetails',));
    }

    public function AllAdd()
    {
        return view('admin.agrodetails.agro_add');
    }

    public function StoreAgro(Request $request)
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


        $productDetails = new AgroDetails;
        $productDetails->product_id           = $request->product_id;
        $productDetails->product_name         = $request->product_name;

        $productDetails->weight               = $request->weight;
        $productDetails->milk_per_day         = $request->milk_per_day;
        $productDetails->cost_price           = $request->cost_price;
        $productDetails->sale_price           = $request->sale_price;

        $productDetails->product_breed        = $request->product_breed;
        $productDetails->product_age          = $request->product_age;
        $productDetails->product_gender       = $request->product_gender;
        $productDetails->location             = $request->location;

        $productDetails->category_id          = "Agro";
        $productDetails->default_img          = "/image/default/default-image.png";


        $productDetails->product_detail_short = $request->product_detail_short;
        $productDetails->product_detail_long  = $request->product_detail_long;

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
        $image_4     = $request->file('product_image_4');
        $image_ext_4 = strtolower($image_4->getClientOriginalExtension());
        $image_gen_4 = hexdec(uniqid());
        $image_new_4 = $image_gen_4 . '.' . $image_ext_4;

        $upload_to   = 'image/product/';
        $image_new_db_4 = $upload_to . $image_new_4;
        $image_4->move($upload_to, $image_new_4);

        $productDetails->product_img_4 = $image_new_db_4;
        ###########################################################################

        // $productDetails->product_img_1        = $request->product_img_1;
        // $productDetails->product_img_2        = $request->product_img_2;
        // $productDetails->product_img_3        = $request->product_img_3;
        // $productDetails->product_img_4        = $request->product_img_4;
        // $productDetails->product_img_5        = $request->product_img_5;
        // $productDetails->product_img_6        = $request->product_img_6;

        // $productDetails->product_img_alt_1    = $request->product_img_alt_1;
        // $productDetails->product_img_alt_2    = $request->product_img_alt_2;
        // $productDetails->product_img_alt_3    = $request->product_img_alt_3;
        // $productDetails->product_img_alt_4    = $request->product_img_alt_4;
        // $productDetails->product_img_alt_5    = $request->product_img_alt_5;
        // $productDetails->product_img_alt_6    = $request->product_img_alt_6;

        $productDetails->user_id = Auth::user()->id;
        $productDetails->save();


        return Redirect()->back()->with('success', 'Product Details Inserted Successfully.');
    }

    public function EditAgro($id)
    {
        # code...        
        $agroDetails = AgroDetails::find($id);

        return view('admin.agrodetails.agro_edit', compact('agroDetails'));
    }


    public function UpdateAgro(Request $request, $id)
    {
        # code...

        $product_id           = $request->product_id;
        $product_name         = $request->product_name;
        $weight               = $request->weight;
        $milk_per_day         = $request->milk_per_day;
        $cost_price           = $request->cost_price;
        $sale_price           = $request->sale_price;
        $product_breed        = $request->product_breed;
        $product_age          = $request->product_age;
        $product_gender       = $request->product_gender;
        $location             = $request->location;
        $product_detail_short = $request->product_detail_short;
        $product_detail_long  = $request->product_detail_long;

        DB::table('agro_details')
            ->where('id', $id)
            ->update([

                'product_id'           => $product_id,
                'product_name'         => $product_name,
                'weight'               => $weight,
                'milk_per_day'         => $milk_per_day,
                'product_age'          => $product_age,
                'product_breed'        => $product_breed,
                'product_gender'       => $product_gender,
                'cost_price'           => $cost_price,
                'sale_price'           => $sale_price,
                'product_gender'       => $product_gender,
                'location'             => $location,
                'product_detail_short' => $product_detail_short,
                'product_detail_long'  => $product_detail_long,
                'user_id'              => Auth::user()->id,
                'updated_at'           => Carbon::now()
            ]);

        return Redirect()->route('agro.all')->with('success', 'Product Details Updated Successfully.');
    }

    public function DeleteAgro($id)
    {

        DB::table('agro_details')->where('id', '=', $id)->delete();

        return Redirect()->route('agro.all')->with('success', 'Product Deleted Successfully.');
    }
}
