<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'titulo'    =>'required|max:100',
            'resumo'    =>'required|max:1000',
            'isbn'      =>'required|min:10|max:20',
            'autor'     =>'required|max:100',
            'file'      =>'image',
            'preco'     =>'required|min:0',
            'paginas'   =>'required|min:1',
            'data_lancamento'   =>'required|date',
            'qtd_estoque'       =>'required|min:0',
            'editora_id'        =>'required',
            'colecao_id'        =>'required',
        ];
    }
}
