<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountUserController extends Controller
{
    public function index()
    {
        // $user = User::with('profile')->where('type','user')->get();
        $user = Auth::user();
        return view('front.clint-profile.account',compact('user'));
    }

    public function update(Request $request)
    {

        $user = $request->user();
                // Upload Image
                // $imgname = 'admin'.time().rand().'_'.$request->file('avatar')->getClientOriginalName();
                // $request->file('image')->move(public_path('storage/avatars'), $imgname);

        $user->profile->fill($request->all())->save();

        return redirect()->route('user.account');
    }
}
