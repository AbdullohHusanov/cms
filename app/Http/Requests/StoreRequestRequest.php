<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestRequest extends FormRequest
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
            'request' => 'required|string',
            'container' => 'required|string',
            'type' => 'required|integer|between:0,3',
            'file_name' => 'required|string|max:128',
            'password' => 'nullable|string|max:64',
            'cng' => 'nullable|integer|between:0,3',
            'status' => 'required|integer|between:0,3',
            'refresh' => 'nullable|integer|between:0,3',
            'user_id' => 'required|integer|exists:users,id',
            'device_id' => 'required|integer|exists:user_devices,id',
            'operator_id' => 'nullable|integer|exists:users,id',
            'branch_user_id' => 'required|integer|exists:branch_users,id',
        ];
    }
}
