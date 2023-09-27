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
        return auth()->check();
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
            'email' => 'max:200|required',
            'birthday' => 'date|required',
            'address_line_1' => 'max:200|required',
            'address_line_2' => 'max:200',
            'postcode' => 'max:6|required',
            'location' => 'min:3|max:50|required',
            'mobile' => 'min:9|max:12|required'
        ];
    }
}
