<?php

use Sibosend\BigNumbers\DecimalConstants as DecimalConstants;
use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

use Sibosend\BigNumbers\Errors\InvalidArgumentTypeError;

date_default_timezone_set('UTC');

class DecimalConstantsTest extends TestCase
{
    public function testFiniteAbs()
    {
        $this->assertTrue(DecimalConstants::pi()->equals(
            Decimal::create("3.14159265358979323846264338327950")
        ));

        $this->assertTrue(DecimalConstants::eulerMascheroni()->equals(
            Decimal::create("0.57721566490153286060651209008240")
        ));

        $this->assertTrue(DecimalConstants::goldenRatio()->equals(
            Decimal::create("1.61803398874989484820458683436564")
        ));

        $this->assertTrue(DecimalConstants::silverRatio()->equals(
            Decimal::create("2.41421356237309504880168872420970")
        ));

        $this->assertTrue(DecimalConstants::lightSpeed()->equals(
            Decimal::create(299792458)
        ));
    }

    public function testE()
    {
        $this->assertTrue(DecimalConstants::e()->equals(
            Decimal::create("2.71828182845904523536028747135266")
        ));

        $this->assertTrue(DecimalConstants::e(32)->equals(
            Decimal::create("2.71828182845904523536028747135266")
        ));

        $this->assertTrue(DecimalConstants::e(16)->equals(
            Decimal::create("2.7182818284590452")
        ));
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\InvalidArgumentTypeError
     * @expectedExceptionMessage $scale must be positive.
     */
    public function testNegativeParamsOnE()
    {
        DecimalConstants::e(-3);
    }
}
