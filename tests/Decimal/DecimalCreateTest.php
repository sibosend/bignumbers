<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use Sibosend\BigNumbers\Errors\InvalidArgumentTypeError;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class A {}  // Empty class used for testing

class DecimalCreateTest extends TestCase
{
    public function testCreateWithInvalidType()
    {
        $thrown = false;
        try {
            Decimal::create([25, 67]);
        } catch (InvalidArgumentTypeError $e) {
            $thrown = true;
        }
        $this->assertTrue($thrown);

        $thrown = false;
        try {
            Decimal::create(new A());
        } catch (InvalidArgumentTypeError $e) {
            $thrown = true;
        }
        $this->assertTrue($thrown);
    }

    public function testCreateFromInteger()
    {
        $this->assertTrue(Decimal::create(-35)->equals(Decimal::create(-35)));
        $this->assertTrue(Decimal::create(0)->equals(Decimal::create(0)));
        $this->assertTrue(Decimal::create(35)->equals(Decimal::create(35)));
    }

//    public function testCreateFromFloat()
//    {
//        $this->assertTrue(Decimal::create(-35.125)->equals(Decimal::fromFloat(-35.125)));
//        $this->assertTrue(Decimal::create(0.0)->equals(Decimal::fromFloat(0.0)));
//        $this->assertTrue(Decimal::create(35.125)->equals(Decimal::fromFloat(35.125)));
//    }

    public function testCreateFromString()
    {
        $this->assertTrue(Decimal::create('-35.125')->equals(Decimal::create('-35.125')));
        $this->assertTrue(Decimal::create('0.0')->equals(Decimal::create('0.0')));
        $this->assertTrue(Decimal::create('35.125')->equals(Decimal::create('35.125')));
    }

    public function testCreateFromDecimal()
    {
        $this->assertTrue(Decimal::create(Decimal::create('345.76'), 1)->equals(Decimal::create('345.8')));
        $this->assertTrue(Decimal::create(Decimal::create('345.76'), 2)->equals(Decimal::create('345.76')));
    }
}