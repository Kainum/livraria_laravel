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
            'product_name' => 'required|max:100',
            'synopsis' => 'required|max:1000',
            'isbn' => 'required|min:10|max:20',
            'author' => 'required|max:100',
            'file' => 'image',
            'slug' => 'required|min:3|max:100|unique:books,slug',
            'price' => 'required|min:0',
            'page_number' => 'required|min:1',
            'release_date' => 'required|date',
            'qty_in_stock' => 'required|min:0',
            'publisher_id' => 'required',
            'collection_id' => 'required',
        ];
    }
}
