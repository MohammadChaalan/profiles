<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Department;
use App\Http\Requests\UserRequest;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    


    public function showRegistrationForm()
    {
        $departments = Department::all();
        $roles = Role::all();
        return view('auth.users.registre', compact('departments','roles'));
    }

    

    

    /**
     * Create a new user .
     *
     * @return \App\Models\User
     */
     function register(UserRequest $request)
    {
        // Create a new user 

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
        ]);

        return redirect()->back()->with(['success' => 'Added successfully']);
    }
}
