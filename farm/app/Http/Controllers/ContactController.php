<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //

    public function contactShow(){
        return view('frontend.contact');
    }

    public function storeContact(Request $request)
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

        $contact = new Contact;
        $contact->contact_name   = $request->contact_name;
        $contact->contact_email  = $request->contact_email;
        $contact->contact_number = $request->contact_number;
        $contact->location       = $request->location;
        $contact->message        = $request->message;
        $contact->save();


        return Redirect()->back()->with('success', 'Contact Request Inserted Successfully.');
    }

    public function contactAll()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.contact_show', compact('contacts'));
    }


    public function contactDelete ($id)
    {

        DB::table('contacts')->where('id','=', $id)->delete();

        return Redirect()->route('contact.all')->with('success', 'Contact Deleted Successfully.');
    }
}
