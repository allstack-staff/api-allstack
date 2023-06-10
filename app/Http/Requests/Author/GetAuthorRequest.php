<?php

namespace App\Http\Requests\Author;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetAuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required_without:email|integer',
            'email' => 'required_without:id|email',
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
