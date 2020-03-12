<?php

namespace App\Http\Requests;

class ReportRequest extends ApiFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'startDate' => 'sometimes|date',
            'endDate'   => 'sometimes|date',
            'status'    => 'sometimes'
        ];
    }
}
