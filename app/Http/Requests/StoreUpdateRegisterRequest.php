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
    public function rules()
    {
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

    public function messages()
    {
        return [
            '*.required' => 'Não Foi Possível Realizar Esta Ação! Este Campo É Obrigatório',
            '*.image' => 'Não Foi Possível Realizar Esta Ação! Selecione Uma Imagem Válida',
            'name.min' => 'Não Foi Possível Realizar Esta Ação! O Nome Deve Ser Válido',
            'name.max' => 'Não Foi Possível Realizar Esta Ação! O Nome Deve Ser Válido',
            'age.min' => 'Não Foi Possível Realizar Esta Ação! A Idade Deve Ser Válida',
            'age.max' => 'Não Foi Possível Realizar Esta Ação! A Idade Deve Ser Válida',
            'cpf.unique' => 'Não Foi Possível Realizar Esta Ação! Este CPF Já Foi Cadastrado'
        ];
    }
}
