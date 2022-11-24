<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $products = Product::with('favouritesUsers')->where($user->id , $favouritesUsers->user_id)->get();

        $wish = $user->favouritesProducts()->latest()->get();

        return view('front.wishlest',compact('wish'));
    }



    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'product_id'  => 'required'
        ]);

        $user->favouritesProducts()->syncWithoutDetaching($request->post('product_id'));

        return redirect()->route('favourites.index');
    }





    public function destroy($id)
    {
        $user = Auth::user();

        $user->favouritesProducts()->detach($id);
    }
}
