<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends ApiFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'value'      => 'required|numeric',
            'date'       => 'required|date',
            'customerId' => 'required|numeric|exists:customers,id',
            'status'     => ['required', Rule::in(Order::STATUS_AVAILABLE)]
        ];
    }
}
