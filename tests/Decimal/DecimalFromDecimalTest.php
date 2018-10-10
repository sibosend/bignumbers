<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalFromDecimalTest extends TestCase
{
    public function testBasicCase()
    {
        $n1 = Decimal::create('3.45');

        $this->assertTrue(Decimal::create($n1)->equals($n1));
        $this->assertTrue(Decimal::create($n1, 2)->equals($n1));

        $this->assertTrue(Decimal::create($n1, 1)->equals(Decimal::create('3.5')));
        $this->assertTrue(Decimal::create($n1, 0)->equals(Decimal::create('3')));
    }
}
