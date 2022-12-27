<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantProductRequest extends FormRequest
{
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_product'     => 'required|exists:Products,id',
            'id_variant'     => 'required|exists:variants,id',
        ];
    }
}
