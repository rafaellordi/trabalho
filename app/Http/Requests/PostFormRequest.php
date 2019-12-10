<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'titulo' => 'required',
            'descricao' => 'required|between:20,5000',
            'data' => 'required',
        ];
    }

    protected function prepareForValidation(){
        if($this->data){
            $data_formatada = str_replace('/', '-', $this->data);
            $data_formatada = date('Y-m-d', strtotime($data_formatada));
            $this->merge(['data' => $data_formatada]);
        }
    }
}
