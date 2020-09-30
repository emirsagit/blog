<?php

namespace App\Http\Controllers\Admin\Setting;

use App\File\File;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class AdminSettingController extends Controller
{
    public function index()
    {
        $this->authorize('superAdmin');
        return view('admin.setting.index');
    }

    public function update(Setting $setting, SettingRequest $request)
    {
        $this->authorize('superAdmin');
        if ($request->file('log')) {
            $file = new File($request->file('logo'), $setting->logo);
            $file->deleteFile("/img/logo.png");
            $setting->logo = $file->uploadFile();
            $setting->save();
        }
        $setting->update($request->only('about', 'tel', 'email', 'whatsapp', 'facebook', 'instagram', 'linkedin', 'twitter', 'github', 'homeTitle', 'homeSubtitle', 'contactTitle', 'contactSubtitle', 'authorTitle', 'authorSubtitle', 'categoryTitle', 'categorySubtitle', 'homeSeoTitle', 'homeSeoDescription', 'categorySeoTitle', 'categorySeoDescription', 'contactSeoTitle', 'contactSeoDescription', 'authorSeoTitle', 'authorSeoDescription'));

        return back()->with([
            'status' => 'Site ayarları güncellendi'
        ]);
    }
}
