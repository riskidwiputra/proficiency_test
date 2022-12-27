<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorevariantsRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'additional_price'     => 'required|integer',
        ];
    }
}
