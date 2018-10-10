<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalFromStringTest extends TestCase
{
    public function testNegativeSimpleString()
    {
        $n1 = Decimal::create('-1');
        $n2 = Decimal::create('-1.0');

        $this->assertTrue($n1->isNegative());
        $this->assertTrue($n2->isNegative());

        $this->assertFalse($n1->isPositive());
        $this->assertFalse($n2->isPositive());

        $this->assertEquals($n1->__toString(), '-1');
        $this->assertEquals($n2->__toString(), '-1.0');
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotationString_With_PositiveExponent_And_Positive()
    {
        $this->assertTrue(
            Decimal::create('1e3')->equals(Decimal::create(1000))
        );

        $this->assertTrue(
            Decimal::create('1.5e3')->equals(Decimal::create(1500))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotationString_With_PositiveExponent_And_NegativeSign()
    {
        $this->assertTrue(
            Decimal::create('-1e3')->equals(Decimal::create(-1000))
        );

        $this->assertTrue(
            Decimal::create('-1.5e3')->equals(Decimal::create(-1500))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotationString_With_NegativeExponent_And_Positive()
    {
        $this->assertTrue(
            Decimal::create('1e-3')->equals(Decimal::create('0.001'))
        );

        $this->assertTrue(
            Decimal::create('1.5e-3')->equals(Decimal::create('0.0015'))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotationString_With_NegativeExponent_And_NegativeSign()
    {
        $this->assertTrue(
            Decimal::create('-1e-3')->equals(Decimal::create('-0.001'))
        );

        $this->assertTrue(
            Decimal::create('-1.5e-3')->equals(Decimal::create('-0.0015'))
        );
    }


    public function testSimpleNotation_With_PositiveSign()
    {
        $this->assertTrue(
            Decimal::create('+34')->equals(Decimal::create('34'))
        );

        $this->assertTrue(
            Decimal::create('+00034')->equals(Decimal::create('34'))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotation_With_PositiveSign()
    {
        $this->assertTrue(
            Decimal::create('+1e3')->equals(Decimal::create('1e3'))
        );

        $this->assertTrue(
            Decimal::create('+0001e3')->equals(Decimal::create('1e3'))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotation_With_LeadingZero_in_ExponentPart()
    {
        $this->assertTrue(
            Decimal::create('1.048576E+06')->equals(Decimal::create('1.048576e6'))
        );
    }

    /**
     * @expectedException Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testExponentialNotation_With_ZeroExponent()
    {
        $this->assertTrue(
            Decimal::create('3.14E+00')->equals(Decimal::create('3.14'))
        );
    }

    /**
     * @expectedException \Sibosend\BigNumbers\Errors\NaNInputError
     * @expectedExceptionMessage strValue must be a number
     */
    public function testBadString()
    {
        Decimal::create('hello world');
    }

    public function testWithScale()
    {
        $this->assertTrue(Decimal::create('7.426', 2)->equals(Decimal::create('7.43')));
    }
}
