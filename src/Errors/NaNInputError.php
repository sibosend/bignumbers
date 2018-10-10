<?php

namespace Sibosend\BigNumbers\Errors;
use DomainException;

class NaNInputError extends DomainException implements BigNumbersError
{
    public function __construct($message = 'NaN values are not supported')
    {
        parent::__construct($message, 0, null);
    }
}
