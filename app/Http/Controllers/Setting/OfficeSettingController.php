<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\OfficeSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OfficeSettingController extends Controller
{

    public function index()
    {
        $officeSetting = OfficeSetting::first();

        return view('admin.setting.office_setting.index', compact('officeSetting'));
    }

    public function update(Request $request, OfficeSetting $officeSetting): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif'],
            'background_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif'],
            'google_map' => ['nullable', 'url'],
            'phone' => ['nullable'],
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'introduction' => ['nullable'],
            'address' => ['nullable', 'string'],
            'delivery_charge'=>['nullable', 'numeric']
        ]);

        if ($request->hasFile('logo')) {
            $this->deleteFile($officeSetting->logo);
        }
        if ($request->hasFile('background_image')) {
            $this->deleteFile($officeSetting->background_image);
        }
        $officeSetting->update($validatedData);

        toast('Office Setting Updated Successfully', 'success');
        return back();
    }

}
