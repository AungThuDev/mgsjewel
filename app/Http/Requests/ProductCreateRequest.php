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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_name' => 'required',
            'mass' => 'required',
            'density' => 'required',
            'refractive_index' => 'required',
            'measurement' => 'required',
            'cut_shape' => 'required',
            'color' => 'required',
            'text_conclusion' => 'required',
            'image' => 'required|image'
        ];
    }
}
