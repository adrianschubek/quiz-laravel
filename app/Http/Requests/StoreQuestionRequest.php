<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            "title" => "required|max:100",
            "answer_1" => "required|max:100",
            "answer_2" => "required_with:answer_3,answer_4|max:100",
            "answer_3" => "required_with:answer_4|max:100",
            "answer_4" => "max:100",
            "correct" => "integer|between:1,4",
            "order" => "integer|between:0,1000"
        ];
    }
}
