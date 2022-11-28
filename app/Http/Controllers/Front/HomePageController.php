<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
         $products = Product::where('featured',1)->with('category')->activestatus()->limit(8)->latest()->get();
         $categories = Category::all();

         $productloops = Product::with('category')->limit(8)->latest()->get();

         return view('front.home',compact('products','categories','productloops'));
    }

    // public function productCategory($id)
    // {
      //  $productloops = Product::with('category')->findOrFail($id)->limit(8)->latest()->get();
        //return view('front.home',compact('productloops'));

    // }
}
