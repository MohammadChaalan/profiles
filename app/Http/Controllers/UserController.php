<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Models\AuditTrail;




class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        return view('profiles.main', compact('user'));
    }

    public function showEditForm(){

         // Get the authenticated user
         $user = Auth::user();
         $departs = Department::get();
         $roles = Role::get();
        
         // Return the view for editing the user's profile
         return view('profiles.edit', compact('user','departs','roles'));

    }

    public function updateProfile($id, Request $request)
{
    $user = User::where('id', $id)->first();

    // Update user profile
    $modifiedFields = $this->updateUser($user, $request->all());

    // Log the modified fields to the audit trail
    $this->logChanges($user, $modifiedFields);

    return redirect()->back()->with(['success' => 'Updated successfully']);
}

protected function updateUser(User $user, array $data): array
{
    $original = $user->getOriginal(); // Get the original user data

    $user->fill($data)->save();

    // Get the modified fields
    return array_diff_assoc($user->getChanges(), $original);
}

protected function logChanges(User $user, array $modifiedFields)
{
    $original = $user->getOriginal(); // Get the original user data

    // Log the modified fields to the audit trail
    foreach ($modifiedFields as $key => $value) {
        AuditTrail::create([
            'user_id' => $user->id,
            'field' => $key,
            'old_value' => $original[$key],
            'new_value' => $value,
        ]);
    }
}


    
}
