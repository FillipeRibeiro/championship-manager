<?php

namespace App\Domains\Team\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;


class GetTeamsValidator extends Validator
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
            'name' => 'nullable|string|max:255',
            'order' => 'nullable|in:asc,desc',
        ];
    }
}
