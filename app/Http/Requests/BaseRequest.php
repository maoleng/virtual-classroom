<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator): void
    {
        $response = new Response([
            'status' => false,
            'message' => $validator->errors()->first(),
        ], 200);
        throw new ValidationException($validator, $response);
    }

    public function messages(): array
    {
        return [
            'required' => 'You do not fill :attribute',
            'unique' => ':attribute is already exists',
            'exists' => ':attribute is not exists',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email address',
            'password' => 'Password',
        ];
    }

    abstract public function rules();
}
