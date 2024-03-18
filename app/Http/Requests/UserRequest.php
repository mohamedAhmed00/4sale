<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'currency' => 'sometimes|string',
            'statusCode' => ['sometimes|string', Rule::in(['authorised', 'decline', 'refunded'])],
            'balanceMin' => 'sometimes|numeric',
            'balanceMax' => 'sometimes|numeric',
            'provider' => ['sometimes|string', Rule::in(['DataProviderX', 'DataProviderY'])],
        ];
    }
}
