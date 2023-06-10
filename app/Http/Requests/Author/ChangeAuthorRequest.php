<?php

namespace App\Http\Requests\Author;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ChangeAuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            // 'id' => 'required|integer',
            'bio' => 'required_without_all:password,name,email|string',
            'email' => 'required_without_all:password,name,bio|string',
            'name' => 'required_without_all:password,email,bio|string',
            'password' => 'required_without_all:email,name,bio|string'
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
