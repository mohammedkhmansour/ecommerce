<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public function edit()
    {
        $settings = Setting::get();
        foreach($settings as $setting){
            return view('dashboard.settings.setting', [
                'setting' => $setting,
            ]);
        }


    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {


            $file = $request->file('logo');
            if ($file->isValid()) {
                $file = $request->file('logo');
                $data['logo']  = $file->store('logo',['disk'=>'public']);

            }
        }

            $settings->update($data);


        // event('settings.updated');
        return redirect()->route('settings.edit')
            ->with('success', 'Settings saved.');
    }
}
