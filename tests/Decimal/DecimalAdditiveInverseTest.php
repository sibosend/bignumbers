<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalAdditiveInverseTest extends TestCase
{
    public function testZeroAdditiveInverse()
    {
        $this->assertTrue(Decimal::create(0)->additiveInverse()->equals(Decimal::create(0)));
    }

    public function testNegativeAdditiveInverse()
    {
        $this->assertTrue(Decimal::create(-1)->additiveInverse()->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('-1.768')->additiveInverse()->equals(Decimal::create('1.768')));
    }

    public function testPositiveAdditiveInverse()
    {
        $this->assertTrue(Decimal::create(1)->additiveInverse()->equals(Decimal::create(-1)));
        $this->assertTrue(Decimal::create('1.768')->additiveInverse()->equals(Decimal::create('-1.768')));
    }
}
