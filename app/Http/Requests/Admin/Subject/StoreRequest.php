<?php

namespace App\Http\Requests\Admin\Subject;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  auth()->user()->hasRole(["admin"]) ;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255',
            'success_mark' => 'required|numeric|min:0',
            'full_mark' => 'required|numeric|min:0|gte:success_mark',
        ];
    }
    public function messages(): array
    {
        return  [
            'subject_input.required' => 'The subject field is required',
            'success_mark.required' => 'The minimum mark field is required',
            'full_mark.required' => 'The full mark field is required',
        ];
    }
}
