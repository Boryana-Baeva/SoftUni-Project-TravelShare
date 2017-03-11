<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.3.2017 г.
 * Time: 02:10 ч.
 */

namespace Exceptions;


use Exception;

class LoginException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}