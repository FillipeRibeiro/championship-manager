<?php

namespace App\Domains\Player\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class GetPlayersValidator extends Validator
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
            'number' => 'nullable|integer|max:99',
            'document' => 'nullable|integer|max:11',
            'order' => 'nullable|in:asc,desc',
        ];
    }
}
