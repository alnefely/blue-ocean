<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthAdminController extends Controller
{
    public function login()
    {
        if(auth('admin')->check()):
            return redirect('/admin/home');
        else:
            return view('backend.auth.login');
        endif;
    }

    public function CheckLogin(Request $request)
    {
        $remembar = $request->remember ? true : false;
        if ( auth('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $remembar) ):
            $admin = Admin::where("email", $request->email)->first();
            auth('admin')->login($admin, $remembar);
            return redirect('/admin/home')->with('success', __('trans.alert.success.login'));
        endif;
        return back()->with('error', __('trans.alert.error.login_admin'));
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/admin/login');
    }

    public function ForgotPassword()
    {
        if(!auth('admin')->check()):
            return view('backend.auth.forgot-password');
        endif;
        return redirect('/admin/login');
    }

    public function SendPassword(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:100|exists:admins',
        ]);
        $newPassword = rand(1000000, 9999999);
        sendEmail($request->email, __('trans.auth.password_recovery'), 'AdminForgotPassword', $newPassword);
        Admin::where('email', $request->email)->update(['password' => bcrypt($newPassword)]);
        return redirect('/admin/login')->with('success', __('trans.auth.send_new_password'));
    }



}
