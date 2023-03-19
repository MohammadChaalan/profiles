<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;




class AdminauthController extends Controller
{

 
    public function index(){


        // Return the view for admin login page
        return view('auth.admin.login');
    }
    
    

    public function checkloginadmin(Request $request){


        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin/users');
        }
        return back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

   
}
