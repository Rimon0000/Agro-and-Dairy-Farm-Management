<?php

namespace App\Http\Controllers;

use App\Models\AgroDetails;
use App\Models\Category;
use App\Models\DairyDetail;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function HomeView(){

        $agroDetails    = AgroDetails::limit(4)->get();
        $dairyDetails   = DairyDetail::where('for_sale', '=', 'Yes')->limit(4)->get();
        $productDetails = ProductDetails::limit(4)->get();
        $categories     = Category::all();

        return view('home',compact('agroDetails','dairyDetails','productDetails','categories'));
    }
}
