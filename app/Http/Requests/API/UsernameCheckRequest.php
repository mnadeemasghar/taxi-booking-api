<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UsernameCheckRequest extends FormRequest
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
            'username' => 'required|unique:users,username'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $data = $validator->errors()->all();
        $message = "Validation Error";
        $response = $this->error_response($data, $message);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
