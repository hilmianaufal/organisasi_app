<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        $users = User::latest()->get();

        return view('admin.settings.general', compact('setting', 'users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|max:255',
            'site_description' => 'nullable',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable|max:255',
            'address' => 'nullable',
            'instagram' => 'nullable|max:255',
            'youtube' => 'nullable|max:255',
            'tiktok' => 'nullable|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $logoPath = $setting->logo;

        if ($request->hasFile('logo')) {

            if ($setting->logo && file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));
            }

            $logo = $request->file('logo');

            $logoName = time() . '.' . $logo->getClientOriginalExtension();

            $logo->move(public_path('uploads/settings'), $logoName);

            $logoPath = 'uploads/settings/' . $logoName;
        }

        $setting->updateOrCreate(
            ['id' => $setting->id],
            [
                'site_name' => $request->site_name,
                'site_description' => $request->site_description,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'logo' => $logoPath,
            ]
        );

        return back()->with('success', 'Settings berhasil diperbarui.');
    }
}