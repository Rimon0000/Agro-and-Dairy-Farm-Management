<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    //
    public function inquiryAll()
    {
        $contacts = Inquiry::latest()->paginate(5);
        return view('admin.inquries.inquries_show', compact('contacts'));
    }

    public function inquiryDelete ($id)
    {

        DB::table('inquiries')->where('id','=', $id)->delete();

        return Redirect()->route('inquiry.all')->with('success', 'Inquiries Deleted Successfully.');
    }
    
    public function storeInquiry(Request $request)
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

        $inquiry = new Inquiry;
        $inquiry->product_name     = $request->product_name;
        $inquiry->product_id       = $request->product_id;
        $inquiry->inquiry_email    = $request->inquiry_email;
        $inquiry->inquiry_fname    = $request->inquiry_fname;
        $inquiry->inquiry_phone    = $request->inquiry_phone;
        $inquiry->inquiry_location = $request->inquiry_location;
        $inquiry->inquiry_message  = $request->inquiry_message;
        $inquiry->video_status     = $request->video_status;
        $inquiry->save();


        return Redirect()->back()->with('success', 'Inquiry Request Inserted Successfully.');
    }
}
