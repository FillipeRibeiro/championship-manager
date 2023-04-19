<?php

namespace App\Domains\Match\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class UpdateMatchValidator extends Validator
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'nullable|date',
            'begin_time' => 'nullable|date_format:d-m-Y H:i:s',
            'end_time' => 'nullable|date_format:d-m-Y H:i:s',
            'goals' => 'nullable|integer',
            'red_card' => 'nullable|integer',
            'yellow_card' => 'nullable|integer',
            'team_id' => 'required|integer|exists:team,id',
        ];
    }
}
