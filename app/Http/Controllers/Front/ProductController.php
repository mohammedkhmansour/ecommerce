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
        $product_categories_ids = $product->category()->pluck('id');

        $rating = $product->reviews()->avg('rating');
        $productratings = $product->reviews()->orderBy('rating', 'DESC')->get();
        $productrelateds = Product::whereHas('category',function($cat) use($product_categories_ids){
            $cat->whereIn('category_id',$product_categories_ids);
        })->limit(5)->latest()->get();
        // $productrelateds = Product::leftJoin('categories as category','category.id','=','products.category_id')->limit(4)->get();

         return $productrelateds;
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
