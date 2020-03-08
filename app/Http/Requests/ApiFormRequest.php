<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class ApiFormRequest extends FormRequest
{
    abstract public function authorize(): bool;
    abstract public function rules(): array;

    protected function failedValidation(Validator $validator): void
    {
        $error =  [
            'shortMessage'       => 'invalidData',
            'message'            => $validator->errors()->first() ?? trans('validation.invalidData'),
            'description'        => [],
        ];

        foreach ($validator->errors()->all() as $message) {
            $error['description'][] = $message;
        }

        $response = response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        throw new HttpResponseException($response);
    }
}
