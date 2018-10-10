<?php

namespace Sibosend\BigNumbers\Errors;
use LogicException;

class NotImplementedError extends LogicException implements BigNumbersError
{
    public function __construct($message = 'Not Implemented feature')
    {
        parent::__construct($message, 0, null);
    }
}
