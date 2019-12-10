<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoFormRequest extends FormRequest
{
    protected $redirect = 'index/#contato';
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
        return([
            'nome'=> 'required|between:3,50',
            'email' => 'required|email|between:5,50',
            'mensagem' => 'required|min:5',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /*public function  messages(){
        return([
            'nome.required' => 'O campo nome é de preenchimento obrigatório',
            'email.required' => 'O campo e-mail é de preenchimento obrigatório',
            'email.email' => 'O campo e-mail é de preenchimento obrigatório',
            'mensagem.required' => 'O campo mensagem é de preenchimento obrigatório',
        ]);
    }*/

}
