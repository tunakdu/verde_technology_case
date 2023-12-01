<?php

namespace App\Http\Requests;

use Faker\Provider\Base;

class OrderRequest extends BaseRequestApi
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'orderSku' => 'required|string',
            'offerSku' => 'required|string',
            'quantity' => 'required|numeric',
            'orderDate' => 'required|date',
        ];
    }
}
