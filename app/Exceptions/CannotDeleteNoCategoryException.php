<?php

namespace App\Exceptions;

use Exception;

class CannotDeleteNoCategoryException extends Exception
{
    protected $message = 'You cannot delete the No Category category.';
    protected $code = 403;
}
