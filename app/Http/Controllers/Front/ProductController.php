<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show(Product $product)
    {

        if ($product->status != "فعال"){
            abort(404);
        }

        $rating = $product->reviews()->avg('rating');
        $productratings = $product->reviews()->orderBy('rating', 'DESC')->get();
        $productrelateds = Product::inRandomOrder()->limit(4)->get();
        return view('front.products.product-details',compact('product','rating','productratings','productrelateds'));
    }

    public function reviews(Request $request , Product $product)
    {
        $reviews = $product->reviews()->create([

            'user_id'      => Auth::id(),
            'rating'       => $request->post('rating'),
            'review'       => $request->post('review')
        ]);

        return redirect()->back();
    }
}
