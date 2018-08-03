<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login (Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->input();
            if(\Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_admin' => 1])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back();
            }
        }
        return view('admin.login');
    }

    public function dashboard ()
    {
        return view('admin.dashboard');
    }
}
