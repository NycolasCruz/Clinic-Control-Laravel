<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRegisterRequest extends FormRequest
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
    function rules() {
        return [
            'name'          => 'required|string|min:3|max:50|',
            'age'           => 'required|integer|min:0|max:120',
            'cpf'           => 'required|string|max:14|unique:App\Models\Register,cpf,'.$this->id.',id',
            'number'        => 'required|string|max:15|',
            'image'         => 'nullable|image',
            'sintomas'      => 'nullable',
            'socialName'    => 'nullable|string|min:3|max:60'
        ];
    }

    function messages() {
        return [
            '*.required'    => 'Este Campo É Obrigatório',
            '*.image'       => 'Selecione Uma Imagem Válida',
            'name.min'      => 'O Nome Deve Ser Válido',
            'name.max'      => 'O Nome Deve Ser Válido',
            'age.min'       => 'A Idade Deve Ser Válida',
            'age.max'       => 'A Idade Deve Ser Válida',
            'cpf.unique'    => 'Este CPF Já Foi Cadastrado'
        ];
    }
}
