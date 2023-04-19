<?php

namespace App\Domains\Player\Validators;

use App\Core\Validator;
use Illuminate\Support\Facades\Auth;

class UpdatePlayerValidator extends Validator
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
            'name' => 'required|string|max:255',
            'number' => 'required|integer|max:99',
        ];
    }
}
