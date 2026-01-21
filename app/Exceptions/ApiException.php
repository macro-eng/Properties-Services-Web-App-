<?php

namespace App\Exceptions;
use Exception;

// todo: change the name to allign with api and web
class ApiException extends Exception
{
    // code 400: Bad Request as default


    public function __construct(string $message  = 'خطأ في النظام', int $statusCode = 400)
    {
        parent::__construct($message, $statusCode);
    }
}
