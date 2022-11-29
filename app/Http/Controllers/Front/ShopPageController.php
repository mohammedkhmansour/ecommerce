<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{

    public function index()
    {
        $request = request();

        $products = Product::with('category')->filter($request->query())->latest()->paginate(21);
        $categories = Category::all();

        return view('front.shop',compact('products','categories'));
    }

    public function filterCategory($id)
    {
        $products = Product::where('category_id',$id)->latest()->paginate(21);
        $categories = Category::all();

        return view('front.shop',compact('products','categories'));


    }

}
