<?php

namespace Villermen\RuneScape\Exception;

use Throwable;

class DataConversionException extends RuneScapeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
