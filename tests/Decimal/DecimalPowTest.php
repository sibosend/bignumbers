<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use Sibosend\BigNumbers\DecimalConstants as DecimalConstants;
use Sibosend\BigNumbers\Errors\NotImplementedError;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalPowTest extends TestCase
{
    public function testZeroPositive()
    {
        $zero = Decimal::create(0);
        $two = Decimal::create(2);

        $this->assertTrue($zero->pow($two)->isZero());
    }

    /**
     * TODO : Split tests, change idiom to take exception message into account.
     */
    public function testZeroNoPositive()
    {
        $zero = DecimalConstants::Zero();
        $nTwo = Decimal::create(-2);

        $catched = false;
        try {
            $zero->pow($nTwo);
        } catch (\DomainException $e) {
            $catched = true;
        }
        $this->assertTrue($catched);

        $catched = false;
        try {
            $zero->pow($zero);
        } catch (\DomainException $e) {
            $catched = true;
        }
        $this->assertTrue($catched);
    }

    public function testNoZeroZero()
    {
        $zero = DecimalConstants::Zero();
        $one = DecimalConstants::One();

        $nTwo = Decimal::create(-2);
        $pTwo = Decimal::create(2);

        $this->assertTrue($nTwo->pow($zero)->equals($one));
        $this->assertTrue($pTwo->pow($zero)->equals($one));
    }

    public function testLittleIntegerInteger()
    {
        $two = Decimal::create(2);
        $three = Decimal::create(3);
        $four = Decimal::create(4);
        $eight = Decimal::create(8);
        $nine = Decimal::create(9);
        $twentyseven = Decimal::create(27);

        $this->assertTrue($two->pow($two)->equals($four));
        $this->assertTrue($two->pow($three)->equals($eight));

        $this->assertTrue($three->pow($two)->equals($nine));
        $this->assertTrue($three->pow($three)->equals($twentyseven));
    }

    public function testLittlePositiveSquareRoot()
    {
        $half = Decimal::create('0.5');
        $two = Decimal::create(2);
        $three = Decimal::create(3);
        $four = Decimal::create(4);
        $nine = Decimal::create(9);

        $this->assertTrue($four->pow($half)->equals($two));
        $this->assertTrue($nine->pow($half)->equals($three));
    }

    public function testBigPositiveSquareRoot()
    {
        $half = Decimal::create('0.5');
        $bignum1 = Decimal::create('922337203685477580700');

        $this->assertTrue($bignum1->pow($half, 6)->equals($bignum1->sqrt(6)));
    }

    /**
     * TODO : Incorrect test! (The exception type should be changed, and the "idiom"!)
     */
    public function testNegativeSquareRoot()
    {
        $half = Decimal::create('0.5');
        $nThree = Decimal::create(-3);

        $catched = false;
        try {
            $nThree->pow($half);
        } catch (NotImplementedError $e) {
            $catched = true;
        }
        $this->assertTrue($catched);
    }

    public function testPositiveWithNegativeExponent()
    {
        $pFive = Decimal::create(5);

        $this->assertTrue(
            $pFive->pow(Decimal::create(-1))->equals(Decimal::create("0.2")),
            "The answer must be 0.2, but was " . $pFive->pow(Decimal::create(-1))
        );
        $this->assertTrue(
            $pFive->pow(Decimal::create(-2))->equals(Decimal::create("0.04")),
            "The answer must be 0.04, but was " . $pFive->pow(Decimal::create(-2))
        );
        $this->assertTrue(
            $pFive->pow(Decimal::create(-3))->equals(Decimal::create("0.008")),
            "The answer must be 0.008, but was " . $pFive->pow(Decimal::create(-3))
        );
        $this->assertTrue(
            $pFive->pow(Decimal::create(-4))->equals(Decimal::create("0.0016")),
            "The answer must be 0.0016, but was " . $pFive->pow(Decimal::create(-4))
        );

        $this->assertTrue(
            $pFive->pow(Decimal::create('-4.5'))->equals(Decimal::create("0.0007155417527999")),
            "The answer must be 0.0007155417527999, but was " . $pFive->pow(Decimal::create('-4.5'))
        );
    }

    public function testNegativeWithPositiveExponent()
    {
        $nFive = Decimal::create(-5);

        $this->assertTrue($nFive->pow(DecimalConstants::One())->equals($nFive));
        $this->assertTrue($nFive->pow(Decimal::create(2))->equals(Decimal::create(25)));
        $this->assertTrue($nFive->pow(Decimal::create(3))->equals(Decimal::create(-125)));
    }

    public function testNegativeWithNegativeExponent()
    {
        $nFive = Decimal::create(-5);

        $this->assertTrue(
            $nFive->pow(Decimal::create(-1))->equals(Decimal::create("-0.2")),
            "The answer must be -0.2, but was " . $nFive->pow(Decimal::create(-1))
        );
        $this->assertTrue($nFive->pow(Decimal::create(-2))->equals(Decimal::create("0.04")));
        $this->assertTrue($nFive->pow(Decimal::create(-3))->equals(Decimal::create("-0.008")));
    }
}
