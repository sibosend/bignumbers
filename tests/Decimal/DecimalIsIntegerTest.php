<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalIsIntegerTest extends TestCase
{
    public function testIntegers()
    {
        $this->assertTrue(Decimal::create(-200)->isInteger());
        $this->assertTrue(Decimal::create(-2)->isInteger());
        $this->assertTrue(Decimal::create(-1)->isInteger());
        $this->assertTrue(Decimal::create(0)->isInteger());
        $this->assertTrue(Decimal::create(1)->isInteger());
        $this->assertTrue(Decimal::create(2)->isInteger());
        $this->assertTrue(Decimal::create(200)->isInteger());

        $this->assertTrue(Decimal::create("-200")->isInteger());
        $this->assertTrue(Decimal::create("-2")->isInteger());
        $this->assertTrue(Decimal::create("-1")->isInteger());
        $this->assertTrue(Decimal::create("0")->isInteger());
        $this->assertTrue(Decimal::create("1")->isInteger());
        $this->assertTrue(Decimal::create("2")->isInteger());
        $this->assertTrue(Decimal::create("200")->isInteger());

        $this->assertTrue(Decimal::create("-200.000")->isInteger());
        $this->assertTrue(Decimal::create("-2.000")->isInteger());
        $this->assertTrue(Decimal::create("-1.000")->isInteger());
        $this->assertTrue(Decimal::create("0.000")->isInteger());
        $this->assertTrue(Decimal::create("1.000")->isInteger());
        $this->assertTrue(Decimal::create("2.000")->isInteger());
        $this->assertTrue(Decimal::create("200.000")->isInteger());
    }

    public function testNotIntegers()
    {
        $this->assertFalse(Decimal::create("-200.001")->isInteger());
        $this->assertFalse(Decimal::create("-2.001")->isInteger());
        $this->assertFalse(Decimal::create("-1.001")->isInteger());
        $this->assertFalse(Decimal::create("0.001")->isInteger());
        $this->assertFalse(Decimal::create("1.001")->isInteger());
        $this->assertFalse(Decimal::create("2.001")->isInteger());
        $this->assertFalse(Decimal::create("200.001")->isInteger());
    }
}
