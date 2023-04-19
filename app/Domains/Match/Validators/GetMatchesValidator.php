<?php

namespace App\Domains\Match\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class GetMatchesValidator extends Validator
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
            'order' => 'nullable|in:asc,desc',
        ];
    }
}
