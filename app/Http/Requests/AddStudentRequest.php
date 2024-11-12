<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:120',
            'surname' => 'required|string|max:120',
            'birthdate' => 'required|date',
            'sex' => 'in:male,female',
            'job' => 'nullable|string|max:120',
            'dad_job' => 'nullable|string|max:120',
            'mom_job' => 'nullable|string|max:120',
            'place' => 'required|string|max:120',
            'residence' => 'required|string|max:120',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'scholar_year' => 'required|string|max:120',
            'email' => 'required|email',
            'study_local' => 'required|string|max:120',
            'dad_tel' => 'nullable|string|regex:/^(0)[0-9]{9}$/',
            'tel' => 'required|string|regex:/^(0)[0-9]{9}$/',
        ];
    }
}
