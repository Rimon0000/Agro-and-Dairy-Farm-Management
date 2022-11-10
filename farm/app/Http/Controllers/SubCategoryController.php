<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //
    public function AllSubCat()
    {
        $subcategories = SubCategory::latest()->paginate(5);
        $categories = Category::all();
        return view('admin.subcategory.subcategory_show', compact('subcategories', 'categories'));
    }

    public function StoreSubCat(Request $request)
    {

        $validated = $request->validate(
            [
                'subcategory' => 'required|unique:sub_categories|max:255',
                'category_id' => 'required',
            ],
            [
                'subcategory.required' => 'Pls Input Sub Category Name.',
                'subcategory.unique' => 'Input Sub Category Name Already Exist.',
                'subcategory.max' => 'Sub Category Name Should Be Less Then 255 Chars.',

                'category_id.required' => 'Category Required.',
            ]
        );

        $Subcategory = new SubCategory;
        $Subcategory->subcategory = $request->subcategory;
        $Subcategory->category_id = $request->category_id;
        $Subcategory->user_id = Auth::user()->id;
        $Subcategory->save();

        return Redirect()->back()->with('success', 'Sub Category Inserted Successfully.');
    }

    public function EditSubCat($id)
    {

        $subcategories = Subcategory::find($id);
        $categories = Category::all();

        return view('admin.subcategory.subcategory_edit', compact('subcategories', 'categories'));
    }


    public function UpdateSubCat(Request $request, $id)
    {

        $subcategory = $request->subcategory;
        $category_id = $request->category_id;

        DB::table('sub_categories')
            ->where('id', $id)
            ->update([
                'subcategory'  => $subcategory,
                'category_id'  => $category_id,
                'user_id' => Auth::user()->id,
                'updated_at'  => Carbon::now()
            ]);

        return Redirect()->route('subcategory.all')->with('success', 'Sub Category Updated Successfully.');
    }


    public function DeleteSubCat($id)
    {

        DB::table('sub_categories')->where('id','=', $id)->delete();

        return Redirect()->route('subcategory.all')->with('success', 'Category Deleted Successfully.');
    }
}
