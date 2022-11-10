<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.brand_show', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {

        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:255',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Pls Input Brand Name.',
                'brand_name.unique' => 'Input Brand Name Already Exist.',
                'brand_name.max' => 'Brand Name Should Be Less Then 255 Chars.',
            ]
        );


        $brand_image = $request->file('brand_image');
        $name_gen    = hexdec(uniqid());
        $img_ext     = strtolower($brand_image->getClientOriginalExtension());
        $img_name    = $name_gen . '.' . $img_ext;
        $upload_to   = 'image/brand/';
        $brand_img = $upload_to . $img_name;
        $brand_image->move($upload_to, $img_name);

        $brand = new Brand;
        $brand->brand_name  = $request->brand_name;
        $brand->brand_image = $brand_img;
        $brand->save();


        return Redirect()->back()->with('success', 'Brand Inserted Successfully.');
    }

    public function EditBrand($id)
    {

        $brands = Brand::find($id);
        return view('admin.brand.brand_edit', compact('brands'));
    }

    public function UpdateBrand(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'brand_name' => 'required|max:255',
            ],
            [
                'brand_name.required' => 'Pls Input Brand Name.',
                'brand_name.max' => 'Brand Name Should Be Less Then 255 Chars.',
            ]
        );

        $brand_image = $request->file('brand_image');
        $old_image = $request->old_image;

        if ($brand_image) {
            $name_gen    = hexdec(uniqid());
            $img_ext     = strtolower($brand_image->getClientOriginalExtension());
            $img_name    = $name_gen . '.' . $img_ext;
            $upload_to   = 'image/brand/';
            $brand_img   = $upload_to . $img_name;
            $brand_image->move($upload_to, $img_name);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name'  => $request->brand_name,
                'brand_image' => $brand_img,
                'created_at'  => Carbon::now()
            ]);

            return Redirect()->route('brand.all')->with('success', 'Brand Updated Successfully.');
        } else {
            Brand::find($id)->update([
                'brand_name'  => $request->brand_name,
                'created_at'  => Carbon::now()
            ]);

            return Redirect()->route('brand.all')->with('success', 'Brand Updated Successfully.');
        }
    }

    public function DeleteBrand($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::findOrFail($id)->delete();
        return Redirect()->route('brand.all')->with('success', 'Brand Deleted Successfully.');
    }
}
