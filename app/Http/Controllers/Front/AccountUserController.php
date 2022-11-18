<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user->profile->fill($request->all())->save();

        $request->validate([
            'password'  => ['required'],
            'new_password' => ['required','confirmed']
        ]);
        $user->forceFill([

            'password'  =>Hash::make($request->post('new_password')),
            'remember_token'    => null,
        ])->save();

        return redirect()->route('user.account');
    }

    public function changePassword()
    {

    }
}
