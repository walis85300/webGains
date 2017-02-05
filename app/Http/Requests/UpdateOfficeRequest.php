<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\ResponseValidatorErrors;

class UpdateOfficeRequest extends FormRequest
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
            'city' => 'required|max:50|string',
            'phone' => 'required|max:50|string',
            'addressLine1' => 'required|max:50|string',
            'addressLine2' => 'max:50|string',
            'state' => 'max:50|string',
            'country' => 'required|max:50|string',
            'postalCode' => 'required|max:15|string',
            'territory' => 'required|max:10|string',
        ];
    }
}
