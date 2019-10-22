<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            "name" => "nullable|unique:users,name|min:5|max:255|alpha_dash",
            "email" => "nullable|unique:users,email|confirmed|email|max:255",
            "password" => "nullable|confirmed|min:8|max:255",
            "current_password" => "required|max:255"
        ];
    }
}
