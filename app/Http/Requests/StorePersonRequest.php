<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:people'],
            'gender' => ['required', 'string', 'max:1', 'in:' . implode(',', GenderEnum::getValues())],
            'birthdate' => ['required', 'date'],
            'birthplace' => ['required', 'string', 'max:255'],
        ];
    }
}