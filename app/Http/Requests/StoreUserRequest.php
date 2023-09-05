<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'cname' => 'required|string|min:2|max:64',
            'sname' => 'nullable|string|max:128',
            'location' => 'required|string|max:64',
            'state' => 'required|string|max:64',
            'country' => 'required|string|max:3',
            'address' => 'required|string|max:64',
            'email' => 'required|email|unique:users,email|max:64',
            'organisation' => 'required|string|max:128',
            'org_unit' => 'required|string|max:128',
            'description' => 'nullable|string|max:64',
            'job' => 'nullable|string|max:64',
            'accounter' => 'nullable|string|max:64',
            'status' => 'nullable|integer|max:2',
            'login' => 'nullable|string',
            'inn' => 'nullable|string|max:9',
            'pinfl' => 'nullable|string|max:14',
            'passport_number' => 'nullable|string|max:12',
            'phone' => 'nullable|numeric|digits:12|regex:/(998)[0-9]{9}/',
            'localCode' => 'nullable|string|max:11',
            'smsuid' => 'nullable|string|max:20',
            'fix' => 'nullable|integer|max:1',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'comment' => 'nullable|string',
            'operator_id' => 'nullable|integer|max:11',
            'branch_user_id' => 'required|integer|max:11',
            'iabsID' => 'nullable|integer|max:9',
            'fido_user_id' => 'nullable|integer|max:11',
            'fido_user_type_id' => 'nullable|integer|max:11',
        ];
    }
}
