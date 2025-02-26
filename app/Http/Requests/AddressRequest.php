<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'cep' => 'required|formato_cep|size:9',
            'endereco' => 'required|max:200',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:50',
            'uf' => 'required|uf|size:2',
            'complemento' => 'max:50',
            'destinatario' => 'required|max:50',
            'phone_number' => 'required|min:11|max:20',
        ];
    }
}
