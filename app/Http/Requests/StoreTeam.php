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
            'id_leagues' => 'required',
            'name'  => 'required',
            'category_id' => 'required',
            'first_name_1' => 'required',
            'last_name_1' => 'required',
            'email_1' => 'required|email:rfc,dns',
            'first_name_2' => 'required',
            'last_name_2' => 'required',
            'email_2' => 'required|email:rfc,dns',
            'first_name_3' => 'required',
            'last_name_3' => 'required',
            'email_3' => 'required|email:rfc,dns',
        ];
    }
}
