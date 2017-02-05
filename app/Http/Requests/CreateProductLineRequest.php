<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\ResponseValidatorErrors;

class CreateProductLineRequest extends FormRequest
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
            'productLine' => 'required|unique:productlines,productLine|max:50|string',
            'textDescription' => 'max:4000|string'
        ];
    }

}
