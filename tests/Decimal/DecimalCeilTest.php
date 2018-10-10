<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;


date_default_timezone_set('UTC');


class DecimalCeilTest extends TestCase
{
    public function testIntegerCeil()
    {
        $this->assertTrue(Decimal::create(0)->ceil()->isZero());
        $this->assertTrue(Decimal::create(0)->ceil()->equals(Decimal::create(0)));

        $this->assertFalse(Decimal::create('0.01')->ceil()->isZero());
        $this->assertFalse(Decimal::create('0.40')->ceil()->isZero());
        $this->assertFalse(Decimal::create('0.50')->ceil()->isZero());

        $this->assertTrue(Decimal::create('0.01')->ceil()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('0.40')->ceil()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('0.50')->ceil()->equals(Decimal::create(1)));
    }

    public function testCeilWithDecimals()
    {
        $this->assertTrue(Decimal::create('3.45')->ceil(1)->equals(Decimal::create('3.5')));
        $this->assertTrue(Decimal::create('3.44')->ceil(1)->equals(Decimal::create('3.5')));
    }

    public function testNoUsefulCeil()
    {
        $this->assertTrue(Decimal::create('3.45')->ceil(2)->equals(Decimal::create('3.45')));
        $this->assertTrue(Decimal::create('3.45')->ceil(3)->equals(Decimal::create('3.45')));
    }

    public function testNegativeCeil()
    {
        $this->assertTrue(Decimal::create('-3.4')->ceil()->equals(Decimal::create('-3.0')));
        $this->assertTrue(Decimal::create('-3.6')->ceil()->equals(Decimal::create('-3.0')));
    }
}
