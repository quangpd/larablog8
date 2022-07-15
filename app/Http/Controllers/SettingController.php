<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('backend.setting.index', compact('setting'));
    }

    public function save(Request $request)
    {
        if (Setting::count() == 0) {
            $setting = new Setting;
            $setting->comment_auto = $request->input('comment_auto', 0);
            $setting->user_auto = $request->input('user_auto', 0);
            $setting->recent_post = $request->input('recent_post', 0);
            $setting->recent_comment = $request->input('recent_comment', 0);
            $setting->popular_post = $request->input('popular_post', 0);
            $setting->save();
        } else {
            $_setting = Setting::first();
            $setting = Setting::find($_setting->id);
            $setting->comment_auto = $request->input('comment_auto', 0);
            $setting->user_auto = $request->input('user_auto', 0);
            $setting->recent_post = $request->input('recent_post', 0);
            $setting->recent_comment = $request->input('recent_comment', 0);
            $setting->popular_post = $request->input('popular_post', 0);
            $setting->save();
        }

        return redirect('admin/setting')->with('success', 'Setting updated successfully');
    }
}
