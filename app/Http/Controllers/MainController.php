<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    public function login_admin_post(Request $request)
    {
        $admin = auth()->guard('admins');
        // return $request->all();
        if($admin->attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')]))
        {
            return redirect()->intended('admin');
        }else {
            return 'information access denied';
        }
    }
    
}
