<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            

                'name' => ['required','string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone_number' => ['required', 'string', 'max:20'],
                'gender' => ['required', 'string', 'in:male,female'],
                'department_id' => ['required', 'exists:departments,id'],
                'role_id' => ['required', 'exists:roles,id'],
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Please Enter Name' ,
            'email.required' => 'Please Enter Email with @' ,
            'password.required' => 'Please Enter Password' ,
            'password.min' => 'minimum characters 8' ,
            'phone_number.required' => 'Please Enter Phone number' ,
            'gender.required' => 'Please Enter gender' ,
            'department_id.required' => 'Please Enter Department' ,
            'role.required' => 'Please Enter Role' ,





           
            
        ];
}
}
