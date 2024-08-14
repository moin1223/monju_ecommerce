<?php

namespace App\Http\Controllers;

use App\Models\ProductCode;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Slider;



// use App\Http\Requests\CheckCodeAuthenticityRequest;

class FrontendController extends Controller
{




    public function homePage()
    {
        return view('frontend.pages.home');
    }


    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $users = User::where('name', 'LIKE', "%{$query}%")->get();
    //     return view('users.search_results', compact('users'));
    // }

    public function product(Request  $request)
    {

        $query = $request->input('query');
        $products = Product::orderBy('id', 'desc')
        ->where('product_name', 'LIKE', "%{$query}%")
        ->get();
    
        // dd($products);
        return view('frontend.pages.home', compact('products'));
    }
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }
}
