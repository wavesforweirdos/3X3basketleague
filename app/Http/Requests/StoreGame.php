<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGame extends FormRequest
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
            'league_id' => 'required',
            'start_time' => 'required',
            'id_teams_local' => 'required',
            'id_teams_visiting' => 'required|different:id_teams_local',
            'id_referees' => 'required',
            'state' => 'required',
        ];
    }
}
