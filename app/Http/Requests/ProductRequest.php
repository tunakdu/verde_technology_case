<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;


class ProductRequest extends BaseRequestApi
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'productSku' =>
                [
                    'required',
                    'string',
                    Rule::unique('products', 'productSku')
                ],
            'name' => 'required|string',
            'category' => 'string',
            'price' => 'required|numeric',
        ];

    }
}
