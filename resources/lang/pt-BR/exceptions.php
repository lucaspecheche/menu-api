<?php

use App\Exceptions\ApiExceptions;
use App\Exceptions\CustomerExceptions;

return [
    ApiExceptions::RESOURCE_NOT_FOUND => 'Recurso não encontrado',
    ApiExceptions::MODEL_NOT_FOUND => 'Modelo não encontrado',
    'customer' => [
        CustomerExceptions::NOT_FOUND => 'Cliente não encontrado'
    ]
];
