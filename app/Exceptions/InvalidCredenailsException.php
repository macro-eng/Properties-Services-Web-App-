<?php
namespace App\Exceptions;

class InvalidCredenailsException extends ApiException
{
   public function __construct( $message="بيانات الدخول غير صحيحة", $code = 404) {
       parent::__construct($message,$code);
    }

}