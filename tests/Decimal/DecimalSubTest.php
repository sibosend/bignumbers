<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;


date_default_timezone_set('UTC');


class DecimalSubTest extends TestCase
{
    public function testZeroSub()
    {
        $one  = Decimal::create(1);
        $zero = Decimal::create(0);

        $this->assertTrue($one->sub($zero)->equals($one));

        $this->assertTrue($zero->sub($one)->equals($one->additiveInverse()));
        $this->assertTrue($zero->sub($one)->equals(Decimal::create(-1)));
        $this->assertTrue($zero->sub($one)->isNegative());
    }

    public function testBasicCase()
    {
        $one = Decimal::create(1);
        $two = Decimal::create(2);

        $this->assertTrue($one->sub($two)->equals(Decimal::create(-1)));
        $this->assertTrue($two->sub($one)->equals($one));

        $this->assertTrue($one->sub($one)->isZero());
    }
}
