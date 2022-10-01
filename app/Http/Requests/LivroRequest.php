<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo'=>'required|max:100',
            'resumo'=>'max:500',
            'isbn'=>'min:14|max:14',
            'autor'=>'max:100',
            'data_lancamento'=>'date',
            'editora_id'=>'required',
            'colecao_id'=>'required',
        ];
    }
}
