<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\ResponseValidatorErrors;

class CreateSaleRequest extends FormRequest
{
    use ResponseValidatorErrors;

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
            'customer' => 'required|exists:customers,customerNumber|numeric',
            'products.*.ID' => 'required|exists:products,productCode',
            'products.*.quantity' => 'required|numeric|exists-enough'
        ];
    }
}
