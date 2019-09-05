<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends AdminBaseController
{
		
	/**
	 * Show account details form
	 * @return [type] [description]
	 */
	public function showForm()
	{
		return view("admin.my-account")->with("user", Auth::user());
	}


	/**
	 * Update admin account username and/or password.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function updateAccount(Request $request)
	{
		$user = Auth::user();

		if($request->filled("name") && $request->name != $user->name) {

			$request->validate(["name" => "required|unique:admins|max:100"]);
			$user->name = $request->name;
		}

		if($request->filled("current_password") || $request->filled("new_password")) {

			if(!Hash::check($request->current_password, $user->password))
				return redirect()->back()->withErrors(["current_password" => "La contraseña actual ingresada es inválida."]);			

			$request->validate(["new_password" => "required|min:6|confirmed"]);	

			$user->password = Hash::make($request->new_password);
		}

		$user->save();

		$request->session()->flash('success');
		return redirect()->back();
	}


}
