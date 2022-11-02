<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Locales;

class ProfilesController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.admin-profile.edit', [
            'user'  => $user,
            'countries'  => Countries::getNames(),
            'locales'     => Locales::getNames()
        ]);
    }


    public function update(Request $request)
    {

        $user = $request->user();
                // Upload Image
                // $imgname = 'admin'.time().rand().'_'.$request->file('avatar')->getClientOriginalName();
                // $request->file('image')->move(public_path('storage/avatars'), $imgname);

         $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {


            $file = $request->file('avatar');
            if ($file->isValid()) {
                $file = $request->file('avatar');
                $data['avatar']  = $file->store('avatars',['disk'=>'public']);

            }
        }
        // dd($data);
        $user->profile->fill($data)->save();

        return redirect()->route('profile.edit');
    }
}
