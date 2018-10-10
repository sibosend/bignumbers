<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalSqrtTest extends TestCase
{
    public function testIntegerSqrt()
    {
        $this->assertTrue(Decimal::create(0)->sqrt()->equals(Decimal::create(0)));
        $this->assertTrue(Decimal::create(1)->sqrt()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create(4)->sqrt()->equals(Decimal::create(2)));
        $this->assertTrue(Decimal::create(9)->sqrt()->equals(Decimal::create(3)));
        $this->assertTrue(Decimal::create(16)->sqrt()->equals(Decimal::create(4)));
        $this->assertTrue(Decimal::create(25)->sqrt()->equals(Decimal::create(5)));
    }

    public function testNearZeroSqrt()
    {
        $this->assertTrue(Decimal::create('0.01')->sqrt()->equals(Decimal::create('0.1')));
        $this->assertTrue(Decimal::create('0.0001')->sqrt()->equals(Decimal::create('0.01')));
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage Decimal can't handle square roots of negative numbers (it's only for real numbers).
     */
    public function testFiniteNegativeSqrt()
    {
        Decimal::create(-1)->sqrt();
    }
}
