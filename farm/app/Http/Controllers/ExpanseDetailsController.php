<?php

namespace App\Http\Controllers;

use App\Models\Expanse;
use App\Models\ExpanseDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpanseDetailsController extends Controller
{
    //
    public function AllExpanse()
    {
        $productDetails = ExpanseDetail::latest()->paginate(5);
        $dairyDetails   = Expanse::all();
        return view('admin.expanse.expanse_show', compact('productDetails', 'dairyDetails'));
    }

    public function StoreExpanse(Request $request)
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


        $productDetails = new ExpanseDetail;
        $productDetails->expanse_date   = $request->expanse_date;
        $productDetails->expanse_name   = $request->expanse_name;
        $productDetails->expanse_amount	= $request->expanse_amount;
        $productDetails->user_id        = Auth::user()->id;
        $productDetails->save();


        return Redirect()->back()->with('success', 'Expanse Details Inserted Successfully.');
    }

    public function EditExpanse($id)
    {

        $productDetails = ExpanseDetail::find($id);
        $dairyDetails   = Expanse::all();
        return view('admin.expanse.expanse_edit', compact('productDetails','dairyDetails'));
    }

    public function UpdateExpanse(Request $request, $id)
    {

        $date = $request->date;
        $expanse_name = $request->expanse_name;
        $expanse_amount = $request->expanse_amount;

        DB::table('expanse_details')
            ->where('id', $id)
            ->update([
                'expanse_date'   => $date,
                'expanse_name'   => $expanse_name,
                'expanse_amount' => $expanse_amount,
                'user_id'        => Auth::user()->id,
                'updated_at'     => Carbon::now()
            ]);

        return Redirect()->route('expanseDetails.all')->with('success', 'Expanse Details Name Updated Successfully.');
    }

    public function DeleteExpanse($id)
    {

        DB::table('expanse_details')->where('id','=', $id)->delete();

        return Redirect()->route('expanseDetails.all')->with('success', 'Expanse Details Deleted Successfully.');
    }
}
