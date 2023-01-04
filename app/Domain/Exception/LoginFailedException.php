<?php

namespace App\Domain\Exception;

use Exception;

class LoginFailedException extends Exception
{
    private const ERROR_MESSAGE = "Invalid credentials";
    public function __construct()
    {
        parent::__construct(self::ERROR_MESSAGE);
    }
}
