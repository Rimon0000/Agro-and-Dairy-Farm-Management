<?php

namespace App\Http\Controllers;

use App\Models\Expanse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpanseController extends Controller
{
    //
    public function AllExpanse()
    {
        $vaccineNames = Expanse::latest()->paginate(5);
        return view('admin.expanse_name.expanse_name_show', compact('vaccineNames'));
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

        $VaccineName = new Expanse;
        $VaccineName->expanse_name  = $request->expanse_name;
        $VaccineName->date          = $request->date;
        $VaccineName->user_id       = Auth::user()->id;
        $VaccineName->save();


        return Redirect()->back()->with('success', 'Expanse Name Inserted Successfully.');
    }

    public function EditExpanse($id)
    {

        $VaccineNames = Expanse::find($id);
        return view('admin.expanse_name.expanse_name_edit', compact('VaccineNames'));
    }

    public function UpdateExpanse(Request $request, $id)
    {

        $date = $request->date;
        $expanse_name = $request->expanse_name;

        DB::table('expanses')
            ->where('id', $id)
            ->update([
                'date'          => $date,
                'expanse_name'  => $expanse_name,
                'user_id'       => Auth::user()->id,
                'updated_at'    => Carbon::now()
            ]);

        return Redirect()->route('expanse.all')->with('success', 'Expanse Name Updated Successfully.');
    }

    public function DeleteExpanse($id)
    {

        DB::table('expanses')->where('id', '=', $id)->delete();

        return Redirect()->route('expanse.all')->with('success', 'Expanse Name Deleted Successfully.');
    }
}
