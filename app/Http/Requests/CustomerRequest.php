<?php

namespace App\Http\Requests;

class CustomerRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => 'required|email|unique:customers,email',
            'firstName' => 'required|string',
            'lastName'  => 'required|string'
        ];
    }
}
