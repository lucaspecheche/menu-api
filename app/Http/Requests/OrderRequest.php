<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Validation\Rule;

class OrderRequest extends ApiFormRequest
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
            'value'      => 'required|numeric',
            'date'       => 'required|date',
            'customerId' => 'required|numeric|exists:customers,id',
            'status'     => ['required', Rule::in(Order::STATUS_AVAILABLE)]
        ];
    }

    protected function toUpdate(): array
    {
        return [
            'value'      => 'sometimes|numeric',
            'date'       => 'sometimes|date',
            'customerId' => 'sometimes|numeric|exists:customers,id',
            'status'     => ['sometimes', Rule::in(Order::STATUS_AVAILABLE)]
        ];
    }
}
