<?php

namespace App\Http\Controllers;

use App\Models\DairyDetail;
use App\Models\Production;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function AllProduction()
    {
        $productDetails = Production::latest()->paginate(5);
        $dairyDetails    = DairyDetail::all();
        return view('admin.production.production_show', compact('productDetails', 'dairyDetails'));
    }

    public function StoreProduction(Request $request)
    {

        // $validated = $request->validate(
        //     [
        //         'subcategory' => 'required|unique:sub_categories|max:255',
        //         'category_id' => 'required',
        //     ],
        //     [
        //         'subcategory.required' => 'Pls Input Sub Category Name.',
        //         'subcategory.unique' => 'Input Sub Category Name Already Exist.',
        //         'subcategory.max' => 'Sub Category Name Should Be Less Then 255 Chars.',

        //         'category_id.required' => 'Category Required.',
        //     ]
        // );

        $production = new Production();
        $production->date           = $request->date;
        $production->cow_id         = $request->cow_id;
        $production->morning_shift    = $request->morning_shift;
        $production->evening_shift    = $request->evening_shift;
        $production->user_id        = Auth::user()->id;
        $production->save();

        return Redirect()->back()->with('success', 'Daily Production Inserted Successfully.');
    }


    public function EditProduction($id)
    {

        $productDetails = Production::find($id);
        $dairyDetails   = DairyDetail::all();

        return view('admin.production.production_edit', compact('productDetails', 'dairyDetails'));
    }


    public function UpdateProduction(Request $request, $id)
    {

        $date          = $request->date;
        $cow_id        = $request->cow_id;
        $morning_shift = $request->morning_shift;
        $evening_shift = $request->evening_shift;

        DB::table('productions')
            ->where('id', $id)
            ->update([
                'date'          => $date,
                'cow_id'        => $cow_id,
                'morning_shift' => $morning_shift,
                'evening_shift' => $evening_shift,
                'user_id'       => Auth::user()->id,
                'updated_at'    => Carbon::now()
            ]);

        return Redirect()->route('production.all')->with('success', 'Daily Production Updated Successfully.');
    }





    public function DeleteProduction($id)
    {

        DB::table('productions')->where('id', '=', $id)->delete();

        return Redirect()->route('production.all')->with('success', 'Product Deleted Successfully.');
    }
}
