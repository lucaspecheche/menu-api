<?php

namespace App\Http\Requests;

class CustomerRequest extends ApiFormRequest
{
    private const CREATE = 'store';
    private const UPDATE = 'update';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $action = $this->route()->getActionMethod();

        switch ($action) {
            case self::CREATE:
                return $this->toStore();
            case self::UPDATE:
                return $this->toUpdate();
            default:
                return [];
        }
    }

    protected function toStore(): array
    {
        return [
            'email'     => 'required|email|unique:customers,email',
            'firstName' => 'required|string',
            'lastName'  => 'required|string',
            'createdAt' => 'sometimes|date'
        ];
    }

    protected function toUpdate(): array
    {
        return [
            'email'     => 'sometimes|email|unique:customers,email',
            'firstName' => 'sometimes|string',
            'lastName'  => 'sometimes|string',
            'createdAt' => 'sometimes|date'
        ];
    }
}
