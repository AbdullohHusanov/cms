<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'iabs_id' => 'nullable|integer',
            'type_certificate' => 'required|string',
            'type_client' => 'required|string',
            'name_owner' => 'required|string',
            'full_name_director' => 'required|string',
            'full_name_accountant' => 'required|string',
            'state' => 'required|integer|exists:states,id',
            'city' => 'required|integer|exists:cities,id',
            'region' => 'required|integer|exists:regions,id',
            'street' => 'required|integer|exists:streets,id',
            'email' => 'required|email',
            'organization' => 'required|string',
            'divisions' => 'required|string',
            'inn' => 'required|string',
            'pinfl' => 'required|string',
            'phone' => 'required|string',
            'token_type' => 'required|string',
            'serial_number_token' => 'required|string',
            'document_file' => 'required|string',
        ];
    }
}
