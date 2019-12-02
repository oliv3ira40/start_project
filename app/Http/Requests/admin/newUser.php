<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

class newUser extends FormRequest
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
        // $is_syndicalist_auth_user = HelpersUsers::isSyndicalistUser();
        // $editable_user = User::find($this->user_id);
        // $this->cpf = str_replace(['.', '-'], '', $this->cpf);

        // if ($is_syndicalist_auth_user)
        // {
        //     return [
        //         'password'=> 'confirmed'
        //     ];
        // } else
        // {
        //     return [
        //         'email'=> ($editable_user->email == $this->email) ? 'required' : 'bail|required|unique:users',
        //         'cpf'=> ($editable_user->cpf == $this->cpf) ? 'required' : 'bail|required|in:'.$this->cpf,
        //         'date_of_birth'=> 'required',
        //         'group_id'=> 'bail|required|array|min:1',
        //         'password'=> 'confirmed'
        //     ];
        // }
        return [
            'first_name'=> 'bail|required|string',
            'last_name'=> '',
            'email'=> 'bail|required|email|unique:users',
            'cpf'=> 'bail|nullable|numeric|unique:users',
            'password'=> 'bail|required|min:5|confirmed',
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
