<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    	return view('users.showProfile', compact('user','currentUser'));
    }

    public function editProfile($id)
    {
    	return view('users.editProfile', ['user' => User::findOrFail($id)]);
    }

    public function update($id)
    {

    	$user = User::findOrFail($id);
    	if (Request::HasFile('avatar'))
	    {
	    	if ($user->avatar != null)
	        {
	            $old_image = $user->avatar;
	        }
	       	$file = Request::file('avatar');
                    
	        $image_name = time() . '-' . $file->getClientOriginalName();

	        $file->move(public_path() . $image_name);

	        $image_alter = Image::make(sprintf(public_path() . '%s', $image_name))->resize(120, 120)->save();

	    }
	    $user->save();
    	return redirect('/user/'.$id);
    	// Avatar::create('Susilo Bambang Yudhoyono')->save('sample.jpg', 100);
    }
}
