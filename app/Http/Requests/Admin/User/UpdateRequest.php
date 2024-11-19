<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole(["admin"]) ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            "email" => 'required|email|unique:email,name,'.$this->category->id,
            'password' => 'required|string|min:3|confirmed',
        ];
    }
    public function messages(): array
    {
        return       [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'email.unique' => 'The email field is already exist',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
