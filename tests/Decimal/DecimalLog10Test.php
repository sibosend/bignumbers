<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalLog10Test extends TestCase
{
    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage Decimal can't represent infinite numbers.
     */
    public function testZeroLog10()
    {
        $zero = Decimal::create(0);
        $zero->log10();
    }

    
    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage Decimal can't handle logarithms of negative numbers (it's only for real numbers).
     */
    public function testNegativeLog10()
    {
        Decimal::create(-1)->log10();
    }

    public function testBigNumbersLog10()
    {
        $bignumber = Decimal::create(bcpow('10', '2417'));
        $pow = Decimal::create(2417);

        $this->assertTrue($bignumber->log10()->equals($pow));
    }

    public function testLittleNumbersLog10()
    {
        $littlenumber = Decimal::create(bcpow('10', '-2417', 2417));
        $pow = Decimal::create(-2417);

        $this->assertTrue($littlenumber->log10()->equals($pow));
    }

    public function testMediumNumbersLog10()
    {
        $this->assertTrue(Decimal::create(75)->log10(5)->equals(Decimal::create('1.87506')));
        $this->assertTrue(Decimal::create(49)->log10(7)->equals(Decimal::create('1.6901961')));
    }
}
