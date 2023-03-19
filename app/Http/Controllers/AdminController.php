<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;





class AdminController extends Controller
{
  

  
    // Retrieve all users with their related departments, roles and audit trails

    public function showUserList()
    {
        $users = User::with(['department', 'role','audit_trail'])->get();

    // Return the view with the retrieved users
        return view('admin.main', compact('users'));
    }

    public function showUserEditForm($id){



        // Retrieve the user by ID and all departments and roles
        $user = User::findOrFail($id);
        $departs = Department::get();
        $roles = Role::get();

        // Return the view with the retrieved user, departments and roles
        return view('admin.users.edit', ['user' => $user],compact('departs','roles'));

}

public function showUserProfile($id){


    // Retrieve the user by ID and all departments and roles
    $user = User::findOrFail($id);
    $departs = Department::get();
    $roles = Role::get();


    // Return the view with the retrieved user, departments and roles
    return view('admin.users.view', ['user' => $user],compact('departs','roles'));

}
    



    public function create(UserRequest $request)
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


    public function showRegistrationForm()
    {

        // Retrieve all departments and roles for user registration
        $departments = Department::all();
        $roles = Role::all();

        // Return the view with the retrieved departments and roles
        return view('admin.users.create', compact('departments','roles'));
    }





    public function updateUserProfile($id,Request $request){


        // Retrieve the user by ID
        $user = User::where('id', $id)->first();

        // Update the user's information with the provided input data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->gender = $request->gender;
        $user->department_id = $request->department;
        $user->role_id = $request->role;


        // Save the updated user information
        $user->save();

        // Redirect back to the previous page
        return redirect()->back()->with(['success' => 'Updated successfully']);
    }

    public function showUserAudit($id){


        // Retrieve all audit trails for the specified user
        $audit = AuditTrail::where('user_id',$id)->get();

       
        // Return the view with the retrieved audit trails
        return view('admin.audit.showaudit',compact('audit'));

    }

    public function showUsersAudit(){


        // Retrieve all audit trails from the database
        $audit = AuditTrail::get();

       
        // Return a view to display the audit trails
        return view('admin.audit.showallaudit',compact('audit'));

    }
}