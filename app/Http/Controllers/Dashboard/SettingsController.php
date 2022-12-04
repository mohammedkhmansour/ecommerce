<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Locales;

class SettingsController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'name');

        return view('dashboard.settings.setting', [
            'currencies' => Currencies::getNames(),
            'locales' => Locales::getNames(),
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {


            $file = $request->file('logo');
            if ($file->isValid()) {
                $file = $request->file('logo');
                $data['logo']  = $file->store('logo',['disk'=>'public']);

            }
        }

        $request->validate([
            'settings.app_name' => 'required',
        ]);

        foreach ($request->post('settings') as $key => $value) {
            $value = $data;
            Setting::updateOrCreate([
                'name' => str_replace('_', '.', $key),
            ], [
                'value' => $value,
            ]);
        }

        // event('settings.updated');

        return redirect()->route('settings.edit')
            ->with('success', 'Settings saved.');
    }
}
