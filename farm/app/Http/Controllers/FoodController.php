<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public function AllFoodName()
    {
        $foods = Food::latest()->paginate(5);
        return view('admin.food_entry.food_show', compact('foods'));
    }


    public function StoreFoodName(Request $request)
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

        $VaccineName = new Food();
        $VaccineName->food_name    = $request->food_name;
        $VaccineName->time         = $request->time;
        $VaccineName->date         = $request->date;
        $VaccineName->total_amount = $request->total_amount;
        $VaccineName->user_id      = Auth::user()->id;
        $VaccineName->save();


        return Redirect()->back()->with('success', 'Food Details Inserted Successfully.');
    }

    public function EditFoodName($id)
    {

        $foods = Food::find($id);
        return view('admin.food_entry.food_edit', compact('foods'));
    }

    public function UpdateFoodName(Request $request, $id)
    {

        $food_name    = $request->food_name;
        $time         = $request->time;
        $date         = $request->date;
        $total_amount = $request->total_amount;

        DB::table('food')
            ->where('id', $id)
            ->update([
                'food_name'    => $food_name,
                'time'         => $time,
                'date'         => $date,
                'total_amount' => $total_amount,
                'user_id'      => Auth::user()->id,
                'updated_at'   => Carbon::now()
            ]);

        return Redirect()->route('food.all')->with('success', 'Food Details Updated Successfully.');
    }


    public function DeleteFoodName($id)
    {

        DB::table('food')->where('id','=', $id)->delete();

        return Redirect()->route('food.all')->with('success', 'Food Details Deleted Successfully.');
    }

}
