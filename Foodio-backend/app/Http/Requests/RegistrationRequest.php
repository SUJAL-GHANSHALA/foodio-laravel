<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z ]*$/|min:3|max:20',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:users',
            'password' => 'required|string|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/|confirmed',
            'password_confirmation' => 'required',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            //name validation
            'name.required' => 'This field is required.',
            'name.regex' => 'Name should only contain letters.',
            'name.min' => 'Name should contain 3 to 20 characters.',
            'name.max' => 'Name should contain 3 to 20 characters.',
            //email validation
            'email.required' => 'This field is required',
            'email.regex' => 'Invalid email format. Example: user@example.com',
            //password validation
            'password.required' => 'This field is required.',
            'password.min' => 'Length of password must be between 8 to 16 characters',
            'password.max' => 'Length of password must be between 8 to 16 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',       
            //password confirmation
            'password_confirmation.required' => 'This field is required',     
        ];
    }
}
