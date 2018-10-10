<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;


date_default_timezone_set('UTC');


class DecimalAsFloatTest extends TestCase
{
    public function testAsInteger()
    {
        $this->assertEquals(1, Decimal::create('1.0')->asInteger());
        $this->assertTrue(is_int(Decimal::create('1.0')->asInteger()));

        $this->assertEquals(1, Decimal::create(1)->asInteger());
        $this->assertTrue(is_int(Decimal::create(1)->asInteger()));

//        $this->assertEquals(1, Decimal::create(1.0)->asInteger());
        $this->assertEquals(1, Decimal::create('1.123123123')->asInteger());

//        $this->assertTrue(is_int(Decimal::create(1.0)->asInteger()));
        $this->assertTrue(is_int(Decimal::create('1.123123123')->asInteger()));
    }

    public function testAsFloat()
    {
        $this->assertEquals(1.0, Decimal::create('1.0')->asFloat());
        $this->assertTrue(is_float(Decimal::create('1.0')->asFloat()));

        $this->assertEquals(1.0, Decimal::create(1)->asFloat());
        $this->assertTrue(is_float(Decimal::create(1)->asFloat()));

//        $this->assertEquals(1.0, Decimal::create(1.0)->asFloat());
        $this->assertEquals(1.123123123, Decimal::create('1.123123123')->asFloat());

//        $this->assertTrue(is_float(Decimal::create(1.0)->asFloat()));
        $this->assertTrue(is_float(Decimal::create('1.123123123')->asFloat()));
    }
}
