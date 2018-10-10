<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalIsZeroTest extends TestCase
{
    public function testZeros()
    {
        $this->assertTrue(Decimal::create(0)->isZero());
        $this->assertTrue(Decimal::create('0.0')->isZero());
        $this->assertTrue(Decimal::create('0')->isZero());
    }

    public function testPositiveNumbers()
    {
        $this->assertFalse(Decimal::create(1)->isZero());
        $this->assertFalse(Decimal::create('1.0')->isZero());
        $this->assertFalse(Decimal::create('0.1')->isZero());
        $this->assertFalse(Decimal::create('1')->isZero());
    }

    public function testNegativeNumbers()
    {
        $this->assertFalse(Decimal::create(-1)->isZero());
        $this->assertFalse(Decimal::create('-1.0')->isZero());
        $this->assertFalse(Decimal::create('-0.1')->isZero());
        $this->assertFalse(Decimal::create('-1')->isZero());
    }
}
