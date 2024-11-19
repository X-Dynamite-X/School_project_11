<?php

namespace App\Http\Requests\Admin\Subject;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /** @var \Illuminate\Contracts\Auth\Authenticatable|\App\Models\User $user */

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
            'success_mark' => 'required|numeric|min:0',
            'full_mark' => 'required|numeric|min:0|gte:success_mark',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required',
            'success_mark.required' => 'The minimum mark field is required',
            'full_mark.required' => 'The full mark field is required',
        ];
    }
}
