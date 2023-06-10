<?php

namespace App\Http\Requests\Author;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'bio' => 'nullable|min:5|string|max:255',
            'name' => 'min:5|required|string|max:255',
            'email' => 'required|string|min:5|max:255',
            'password' => 'min:5|required|string|max:255'
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if (!$this->filled('bio')) {
            $this->merge(['bio' => 'no bio yet']);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new DomainException($validator->messages()->all(), 422);
    }
}
