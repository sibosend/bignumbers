<?php
declare(strict_types = 1);

use Sibosend\BigNumbers\Decimal;
use PHPUnit\Framework\TestCase;

class DecimalIsLessThanTest extends TestCase
{
    public function testGreater()
    {
        $this->assertFalse(Decimal::create('1.01')->isLessThan(Decimal::create('1.001')));
    }

    public function testEqual()
    {
        $this->assertFalse(Decimal::create('1.001')->isLessThan(Decimal::create('1.001')));
    }

    public function testLess()
    {
        $this->assertTrue(Decimal::create('1.001')->isLessThan(Decimal::create('1.01')));
    }
}
