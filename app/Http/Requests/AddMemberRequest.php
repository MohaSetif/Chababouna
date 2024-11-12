<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMemberRequest extends FormRequest
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
            'name' => 'required|max:120',
            'surname' => 'required|max:120',
            'sex' => 'in:male,female',
            'job' => 'required|max:120',
            'birthdate' => 'required|date',
            'hobby' => 'required|max:120',
            'help' => 'required|max:120',
            'place' => 'required|max:120',
            'residence' => 'required|max:120',
            'email' => 'required|email',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'scholar_year' => 'required|max:120',
            'tel' => 'required|regex:/(0)[0-9]{9}$/',
        ];
    }
}
