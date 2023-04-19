<?php

namespace App\Domains\Match\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class CreateMatchValidator extends Validator
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'begin_time' => 'required|date_format:d-m-Y H:i:s',
            'end_time' => 'required|date_format:d-m-Y H:i:s',

            'team_id_A' => 'required|integer|exists:teams,id|different:team_id_B',
            'team_id_B' => 'required|integer|exists:teams,id|different:team_id_A',

            'goals_team_id_A' => 'required|integer',
            'goals_team_id_B' => 'required|integer',

            'yellow_card_team_id_A' => 'required|integer',
            'red_card_team_id_A' => 'required|integer',

            'yellow_card_team_id_B' => 'required|integer',
            'red_card_team_id_B' => 'required|integer',
        ];
    }
}
