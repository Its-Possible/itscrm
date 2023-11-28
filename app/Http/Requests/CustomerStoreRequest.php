<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'min:5|max:200|required',
            'email' => 'max:200|unique:customers|required',
            'birthday' => 'date|required',
            'address-line-1' => 'max:200|required',
            'address-line-2' => 'max:200',
            'postcode' => 'max:10|required',
            'location' => 'min:3|max:50|required',
            'mobile' => 'min:9|max:12|required'
        ];
    }
}
