<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->activestatus()->limit(8)->latest()->get();
        return view('front.home',compact('products'));
    }
}
