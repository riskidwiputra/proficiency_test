<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresalesRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method'    => 'required',
            'orders.*.id_product'  => 'required|exists:Products,id',
        ];
    }
}
