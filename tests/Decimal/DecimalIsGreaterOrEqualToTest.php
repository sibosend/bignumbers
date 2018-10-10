<?php
declare(strict_types = 1);

use Sibosend\BigNumbers\Decimal;
use PHPUnit\Framework\TestCase;

class DecimalIsGreaterOrEqualToTest extends TestCase
{
    public function testGreater()
    {
        $this->assertTrue(Decimal::create('1.01')->isGreaterOrEqualTo(Decimal::create('1.001')));
    }

    public function testEqual()
    {
        $this->assertTrue(Decimal::create('1.001')->isGreaterOrEqualTo(Decimal::create('1.001')));
    }

    public function testLess()
    {
        $this->assertFalse(Decimal::create('1.001')->isGreaterOrEqualTo(Decimal::create('1.01')));
    }
}
