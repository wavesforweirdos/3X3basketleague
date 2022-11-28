<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeam extends FormRequest
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
            'name'  => 'required',
            'category_id' => 'required',
            'first_name[0]' => 'required',
            'first_name[1]' => 'required',
            'first_name[2]' => 'required',
            'last_name[0]' => 'required',
            'last_name[1]' => 'required',
            'last_name[2]' => 'required',
            'birthdate[0]' => 'required',
            'birthdate[1]' => 'required',
            'birthdate[2]' => 'required',
            'email[0]' => 'required',
            'email[1]' => 'required',
            'email[2]' => 'required',
        ];
    }
}
