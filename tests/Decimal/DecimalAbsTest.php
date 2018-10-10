<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalAbsTest extends TestCase
{
    public function testAbs()
    {
        $this->assertTrue(Decimal::create(0)->abs()->equals(Decimal::create(0)));
        $this->assertTrue(Decimal::create(5)->abs()->equals(Decimal::create(5)));
        $this->assertTrue(Decimal::create(-5)->abs()->equals(Decimal::create(5)));
    }
}
