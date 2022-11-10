<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VaccineName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VaccineNameController extends Controller
{
    //
    public function AllVaccineName()
    {
        $vaccineNames = VaccineName::latest()->paginate(5);
        return view('admin.vaccine_name.vaccine_name_show', compact('vaccineNames'));
    }

    public function StoreVaccineName(Request $request)
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

        $VaccineName = new VaccineName;
        $VaccineName->vaccine_name  = $request->vaccine_name;
        $VaccineName->user_id = Auth::user()->id;
        $VaccineName->save();


        return Redirect()->back()->with('success', 'Vaccine Name Inserted Successfully.');
    }

    public function EditVaccineName($id)
    {

        $VaccineNames = VaccineName::find($id);
        return view('admin.vaccine_name.vaccine_name_edit', compact('VaccineNames'));
    }

    public function UpdateVaccineName(Request $request, $id)
    {

        $vaccine_name = $request->vaccine_name;

        DB::table('vaccine_names')
            ->where('id', $id)
            ->update([
                'vaccine_name'  => $vaccine_name,
                'user_id' => Auth::user()->id,
                'updated_at'  => Carbon::now()
            ]);

        return Redirect()->route('vaccineName.all')->with('success', 'Vaccine Name Updated Successfully.');
    }

    public function DeleteVaccineName($id)
    {

        DB::table('vaccine_names')->where('id','=', $id)->delete();

        return Redirect()->route('vaccineName.all')->with('success', 'Vaccine Name Deleted Successfully.');
    }
}
