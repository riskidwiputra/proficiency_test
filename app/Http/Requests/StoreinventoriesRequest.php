<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreinventoriesRequest extends FormRequest
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
            'price'     => 'required|integer',
            'amount'    => 'required|integer',
            'unit'      => 'required|string',
        ];
    }
}
