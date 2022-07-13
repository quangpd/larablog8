<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function login()
    {
        if (session()->has('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.login');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $userCheck = Admin::where('username', $username)->count();
        if ($userCheck == 0) {
            return redirect()->back()->with('error', 'Username not found');
        } else {
            $user = Admin::where('username', $username)->first();

            if ($user->password != $password) {
                return redirect()->back()->with('error', 'Password not match');
            } else {
                $request->session()->put('admin', $user);
                return redirect()->route('admin.dashboard');
            }
        }
    }

    public function index()
    {
        return view('backend.index');
    }
}
