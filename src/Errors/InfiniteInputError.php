<?php

namespace Sibosend\BigNumbers\Errors;
use DomainException;

class InfiniteInputError extends DomainException implements BigNumbersError
{
    public function __construct($message = 'Infinite values are not supported')
    {
        parent::__construct($message, 0, null);
    }
}
