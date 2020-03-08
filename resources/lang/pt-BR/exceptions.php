<?php

use App\Exceptions\ApiExceptions;
use App\Exceptions\CustomerExceptions;

return [
    ApiExceptions::RESOURCE_NOT_FOUND => 'Recurso não encontrado',
    'customer' => [
        CustomerExceptions::NOT_FOUND => 'Cliente não encontrado'
    ]
];
