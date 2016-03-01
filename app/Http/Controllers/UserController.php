<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('users.index', compact('users'));
    }

    public function showProfile($id)
    {
    	$user = User::findOrFail($id);
    	$currentUser = Auth::user();

        $gravatar = $this->gravatar_link($user->email);

    	return view('users.showProfile', compact('user','currentUser','gravatar'));
    }

    public function gravatar_link($email)
    {
        $email = md5($email);

        return "//www.gravatar.com/avatar/{$email}";
    }

    public function editProfile($id)
    {
    	return view('users.editProfile', ['user' => User::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
    	$user = User::findOrFail($id);
    	
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('user/'.$id.'/editProfile')
                        ->withErrors($validator)
                        ->withInput();
        }

	    $user->update($request->all());

    	return redirect('/user/'.$id);
    	// Avatar::create('Susilo Bambang Yudhoyono')->save('sample.jpg', 100);
    }
}
