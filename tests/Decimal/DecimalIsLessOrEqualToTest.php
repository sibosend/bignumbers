<?php
declare(strict_types = 1);

use Sibosend\BigNumbers\Decimal;
use PHPUnit\Framework\TestCase;

class DecimalIsLessOrEqualToTest extends TestCase
{
    public function testGreater()
    {
        $this->assertFalse(Decimal::create('1.01')->isLessOrEqualTo(Decimal::create('1.001')));
    }

    public function testEqual()
    {
        $this->assertTrue(Decimal::create('1.001')->isLessOrEqualTo(Decimal::create('1.001')));
    }

    public function testLess()
    {
        $this->assertTrue(Decimal::create('1.001')->isLessOrEqualTo(Decimal::create('1.01')));
    }
}
