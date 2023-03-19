<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ChangePasswordController extends Controller
{

    /*

    Show the form to edit the user's password.
    @return \Illuminate\View\View

    */
    public function viewPassword(){


        return view("auth.passwords.edit");


    }


    /*

     Update the user's password.
  
     @param \Illuminate\Http\Request $request

     @return \Illuminate\Http\RedirectResponse
     
    */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('profile.edit')->with('status', __('Password changed successfully.'));
    }

}
