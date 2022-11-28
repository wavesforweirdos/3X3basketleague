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
            'phone' => 'required|digits:9',
            'state'  => 'required',
            'entity_name' => 'required',
            'foundation_year'  => 'required|digits:4|integer|min:1900',
            'entity_phone'  => 'required|digits:9',
            'email'  => 'required|email:rfc,dns',
            'country'  => 'required',
            'city'  => 'required',
            'photo' => 'mimes:csv,txt,xlx,xls,pdf|max:2048'
        ];
    }
}
