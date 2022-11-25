<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class StoreEntity extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone' => 'required',
            'state'  => 'required',
            'entity_name' => 'required',
            'foundation_year'  => 'required',
            'entity_phone'  => 'required',
            'email'  => 'required|email:rfc,dns',
            'country'  => 'required',
            'city'  => 'required',
            'image' => File::image()->min(900)->max(12 * 1024)->dimensions(Rule::dimensions()->maxWidth(500)->maxHeight(500)),
        ];
    }
}
