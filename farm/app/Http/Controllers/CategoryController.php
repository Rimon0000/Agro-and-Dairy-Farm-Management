<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.category_show', compact('categories'));
    }


    public function StoreCat(Request $request)
    {

        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
                'category_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'category_name.required' => 'Pls Input Category Name.',
                'category_name.unique' => 'Input Category Name Already Exist.',
                'category_name.max' => 'Category Name Should Be Less Then 255 Chars.',

                'category_image.required' => 'Category Image Required.',

            ]
        );

        $category_image = $request->file('category_image');
        $name_gen       = hexdec(uniqid());
        $img_ext        = strtolower($category_image->getClientOriginalExtension());
        $img_name       = $name_gen . '.' . $img_ext;
        $upload_to      = 'image/category/';
        $category_img   = $upload_to . $img_name;
        $category_image->move($upload_to, $img_name);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_url  = $request->category_url;
        $category->cat_img = $category_img;
        $category->user_id = Auth::user()->id;
        $category->save();


        return Redirect()->back()->with('success', 'Category Inserted Successfully.');
    }

    public function EditCat($id)
    {
        $categories = Category::find($id);
        return view('admin.category.category_edit', compact('categories'));
    }

    public function UpdateCat(Request $request, $id)
    {

        $category_image = $request->file('category_image');
        $old_image      = $request->old_image;

        if ($category_image) {

            $name_gen     = hexdec(uniqid());
            $img_ext      = strtolower($category_image->getClientOriginalExtension());
            $img_name     = $name_gen . '.' . $img_ext;
            $upload_to    = 'image/category/';
            $category_img = $upload_to . $img_name;
            $category_image->move($upload_to, $img_name);

            DB::table('categories')
                ->where('id', $id)
                ->update(['category_name' => $request->category_name, 'cat_img' => $category_img, 'category_url' => $request->category_url ]);

            unlink($old_image);

            return Redirect()->route('category.all')->with('success', 'Category Updated Successfully.');

        } else {

            DB::table('categories')
                ->where('id', $id)
                ->update(['category_name' => $request->category_name, 'category_url' => $request->category_url, 'user_id' => Auth::user()->id, 'created_at' => Carbon::now() ]);

            return Redirect()->route('category.all')->with('success', 'Category Updated Successfully.');
        }
    }

    public function DeleteCat($id)
    {
        $image     = Category::find($id);
        $old_image = $image->cat_img;
        unlink($old_image);

        DB::table('categories')->where('id','=', $id)->delete();

        return Redirect()->route('category.all')->with('success', 'Category Deleted Successfully.');
    }
    
    public function ViewCat($id)
    {
        $categories = Category::find($id);
        return view('admin.category.category_view', compact('categories'));
    }
}
