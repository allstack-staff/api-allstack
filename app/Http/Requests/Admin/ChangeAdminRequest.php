<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ChangeAdminRequest extends FormRequest
{
    public function rules()
    {
        return [
            // 'id' => 'required|integer',
            'email' => 'required_without:password,name|string',
            'name' => 'required_without:password,email|string',
            'password' => 'required_without:email,name|string'
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new DomainException($validator->messages()->all(), 422);
    }
}
