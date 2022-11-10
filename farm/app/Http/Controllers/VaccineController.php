<?php

namespace App\Http\Controllers;

use App\Models\AgroDetails;
use App\Models\DairyDetail;
use App\Models\Vaccine;
use App\Models\VaccineName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{
    //
    public function AllVaccine()
    {
        $productDetails = Vaccine::latest()->paginate(5);
        $VaccineNames   = VaccineName::all();

        $dairyDetails  = DairyDetail::get('product_id');
        $agroDetails   = AgroDetails::get('product_id');

        return view('admin.vaccine.vaccine_show', compact('productDetails', 'dairyDetails', 'agroDetails', 'VaccineNames',));
    }

    public function ReminderVaccine()
    {
        $ldate = date('Y-m-d');
        $getReminders = Vaccine::where('vaccine_notification', $ldate)->where('status', 0)->latest()->paginate(5);
        $getdata      = Vaccine::where('status', 1)->latest()->paginate(5);
        return view('admin.vaccine.vaccine_reminder', compact('getReminders', 'getdata'));
    }

    public function StoreVaccine(Request $request)
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


        $productDetails = new Vaccine;
        $productDetails->vaccine_date         = $request->vaccine_date;
        $productDetails->cow_id               = $request->cow_id;
        $productDetails->vaccine              = $request->vaccine_id;
        $productDetails->vaccine_notification = $request->vaccine_notification;
        $productDetails->user_id = Auth::user()->id;
        $productDetails->save();


        return Redirect()->back()->with('success', 'Vaccine Details Inserted Successfully.');
    }

    public function EditVaccine($id)
    {

        $productDetails = Vaccine::find($id);
        $vaccineNames   = VaccineName::all();
        $dairyDetails   = DairyDetail::all();

        return view('admin.vaccine.vaccine_edit', compact('productDetails', 'dairyDetails', 'vaccineNames'));
    }

    public function UpdateVaccine(Request $request, $id)
    {

        $vaccine_date         = $request->vaccine_date;
        $cow_id               = $request->cow_id;
        $vaccine              = $request->vaccine;
        $vaccine_notification = $request->vaccine_notification;

        DB::table('vaccines')
            ->where('id', $id)
            ->update([
                'vaccine_date'         => $vaccine_date,
                'cow_id'               => $cow_id,
                'vaccine'              => $vaccine,
                'vaccine_notification' => $vaccine_notification,
                'user_id'              => Auth::user()->id,
                'updated_at'           => Carbon::now()
            ]);

        return Redirect()->route('vaccine.all')->with('success', 'Vaccine Details Name Updated Successfully.');
    }


    public function UpdateVaccineReminder($id)
    {

        DB::table('vaccines')
            ->where('id', $id)
            ->update([
                'status' => 1
            ]);

        return Redirect()->route('vaccine.reminder')->with('success', 'Vaccine Is Given Successfully.');
    }

    public function DeleteVaccine($id)
    {
        DB::table('vaccines')->where('id', '=', $id)->delete();
        return Redirect()->route('vaccine.all')->with('success', 'Vaccine Details Deleted Successfully.');
    }
}
