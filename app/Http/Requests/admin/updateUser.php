<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

class updateUser extends FormRequest
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
        $editable_user = User::find($this->id);
        $this->cpf = str_replace(['.', '-'], '', $this->cpf);

        return [
            'first_name'=> 'bail|required|string',
            'last_name'=> '',
            'email'=> ($editable_user->email == $this->email) ? 'bail|required|email' : 'bail|required|email|unique:users',
            'cpf'=> ($editable_user->cpf == $this->cpf) ? 'bail|nullable|numeric' : 'bail|nullable|numeric|unique:users',
            'password'=> 'bail|nullable|min:5|confirmed',
            'group_id'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.numeric'=> 'Apenas números neste campo',
            'email.unique'=> 'Este E-MAIL já esta sendo utilizado',
            'cpf.unique'=> 'Este CPF já esta sendo utilizado'
        ];
    }
}
