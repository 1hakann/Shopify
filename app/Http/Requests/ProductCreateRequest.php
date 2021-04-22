<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'

        ];
    }

    public function attributes()
    {
       return [
        'name' => 'Ürün Adı',
        'description' => 'Ürün Kategorisi',
        'price' => 'Ücret',
        'category_id' => 'Kategori Adı',
        'image' => 'Ürün Fotoğrafı'
       ];
    }
}
