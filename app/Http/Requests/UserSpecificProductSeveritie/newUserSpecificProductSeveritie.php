<?php

namespace App\Http\Requests\UserSpecificProductSeveritie;

use Illuminate\Foundation\Http\FormRequest;

class newUserSpecificProductSeveritie extends FormRequest
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
            'name'                  => 'required',
            'tag_color'             => 'bail|required|not_in:#ffffff',
            'time_for_response'     => 'required',
            'time_for_resolution'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tag_color.not_in'=> 'Esta cor não é aceita',
        ];
    }
}
