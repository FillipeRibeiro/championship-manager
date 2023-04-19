<?php

namespace App\Domains\Rating\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class GetRatingValidator extends Validator
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
            'order' => 'nullable|in:asc,desc',
            'goals' => 'nullable|in:asc,desc',
        ];
    }
}
