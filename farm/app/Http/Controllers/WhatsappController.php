<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WhatsappController extends Controller
{
    //
    //
    public function AllCat()
    {

        $Whatsapps = Whatsapp::all();
        $count = Whatsapp::count();
        return view('admin.whatsapp.whatsapp_show', compact('Whatsapps','count'));
    }

    public function StoreCat(Request $request)
    {

        $validated = $request->validate(
            [
                'number' => 'required|unique:whatsapps|max:255',
            ],
            [
                'number.required' => 'Pls Input Number.',
            ]
        );


        $whatsapp = new Whatsapp();
        $whatsapp->number = $request->number;
        $whatsapp->user_id = Auth::user()->id;
        $whatsapp->save();


        return Redirect()->back()->with('success', 'Number Inserted Successfully.');
    }


    public function DeleteCat($id)
    {

        DB::table('whatsapps')->where('id','=', $id)->delete();

        return Redirect()->route('whatsapp.all')->with('success', 'Number Deleted Successfully.');
    }

}
