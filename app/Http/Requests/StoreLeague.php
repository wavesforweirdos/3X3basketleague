<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class StoreLeague extends FormRequest
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
            'name' => 'required',
            'min_age'  => 'required',
            'max_players' => 'required',
            'registration_day' => 'required|date|before:start_day',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after:start_day',
            'street' => 'required',
            'number'  => 'required',
            'zip_code'  => 'required',
            'city'  => 'required',
            'team_gender' => 'required',
            'gender.*' => 'in:Femenino,Masculino,Mixto',
        ];
    }
}
