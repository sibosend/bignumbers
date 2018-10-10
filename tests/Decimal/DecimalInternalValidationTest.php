<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

use Sibosend\BigNumbers\Errors\InvalidArgumentTypeError;

date_default_timezone_set('UTC');

class DecimalInternalValidationTest extends TestCase
{
    /**
     * @expectedException Sibosend\BigNumbers\Errors\InvalidArgumentTypeError
     */
    public function testConstructorNullValueValidation()
    {
        Decimal::create(null);
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\InvalidArgumentTypeError
     * @expectedExceptionMessage $scale must be a positive integer
     */
    public function testConstructorNegativeScaleValidation()
    {
        Decimal::create("25", -15);
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\InvalidArgumentTypeError
     * @expectedExceptionMessage $scale must be a positive integer
     */
    public function testOperatorNegativeScaleValidation()
    {
        $one = Decimal::create(1);

        $one->mul($one, -1);
    }
}
