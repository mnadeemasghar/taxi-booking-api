<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\ApiResponse;

class SearchRequest extends FormRequest
{
    use ApiResponse;
    
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
            'pick_lat' => 'required',
            'pick_lng' => 'required',
            'drop_lat' => 'required',
            'drop_lng' => 'required',
            // 'threshold' => 'required|digits_between:0,1000'
            'threshold' => 'required'
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
