<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalFloorTest extends TestCase
{
    public function testIntegerFloor()
    {
        $this->assertTrue(Decimal::create('0.00')->floor()->isZero());
        $this->assertTrue(Decimal::create('0.00')->floor()->equals(Decimal::create(0)));

        $this->assertTrue(Decimal::create('0.01')->floor()->isZero());
        $this->assertTrue(Decimal::create('0.40')->floor()->isZero());
        $this->assertTrue(Decimal::create('0.50')->floor()->isZero());

        $this->assertTrue(Decimal::create('0.01')->floor()->equals(Decimal::create(0)));
        $this->assertTrue(Decimal::create('0.40')->floor()->equals(Decimal::create(0)));
        $this->assertTrue(Decimal::create('0.50')->floor()->equals(Decimal::create(0)));

        $this->assertTrue(Decimal::create('1.01')->floor()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('1.40')->floor()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('1.50')->floor()->equals(Decimal::create(1)));
    }

    public function testFloorWithDecimals()
    {
        $this->assertTrue(Decimal::create('3.45')->floor(1)->equals(Decimal::create('3.4')));
        $this->assertTrue(Decimal::create('3.44')->floor(1)->equals(Decimal::create('3.4')));
    }

    public function testNoUsefulFloor()
    {
        $this->assertTrue(Decimal::create('3.45')->floor(2)->equals(Decimal::create('3.45')));
        $this->assertTrue(Decimal::create('3.45')->floor(3)->equals(Decimal::create('3.45')));
    }

    public function testNegativeFloor()
    {
        $this->assertTrue(Decimal::create('-3.4')->floor()->equals(Decimal::create('-4.0')));
        $this->assertTrue(Decimal::create('-3.6')->floor()->equals(Decimal::create('-4.0')));
    }
}
