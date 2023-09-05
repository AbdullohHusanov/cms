<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'ca_id' => 'nullable|string',
            'issuer' => 'nullable|string|max:256',
            'cert_sn' => 'required|string|max:64',
            'cert_thumb' => 'nullable|string|max:64',
            'cert_from' => 'required|string',
            'cert_to' => 'required|string',
            'base64' => 'required|string',
            'pfx' => 'nullable|string',
            'cng' => 'nullable|integer|between:0,3',
            'type' => 'nullable|integer|between:0,3',
            'status' => 'required|integer|between:0,3',
            'imported' => 'nullable|integer|between:0,3',
            'rev_reason' => 'nullable|string|max:255',
            'branch_rev_status' => 'nullable|integer|between:0,3',
            'file_name' => 'nullable|string|max:128',
            'last_login' => 'nullable|string|max:128',
            'sync' => 'required|integer|between:0,3',
            'req_id' => 'required|integer|exists:request,id',
            'branch_user_id' => 'required|integer|exists:branch_users,id',
            'operator_id' => 'required|integer|exists:users,id',
            'client_id' => 'required|integer|exists:request,id',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
