<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //

    public function AllReport()
    {


        $categories      = DB::table('categories')->count();
        $sub_categories  = DB::table('sub_categories')->count();
        $agro_details    = DB::table('agro_details')->count();
        $dairy_details   = DB::table('dairy_details')->count();
        $dairy_details   = DB::table('dairy_details')->count();

        $expanse_details = DB::table('expanse_details')->where('expanse_date', date('Y-m-d'))->sum('expanse_details.expanse_amount');
        $orders          = DB::table('orders')->whereDate('created_at', date('Y-m-d'))->sum('orders.total_price');

        return view('admin.Report.report', compact('categories','sub_categories','dairy_details','agro_details','dairy_details','expanse_details','orders'));
    }
}
