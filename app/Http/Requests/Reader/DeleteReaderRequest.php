<?php

namespace App\Http\Requests\Reader;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DeleteReaderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer',
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
