<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group arcsin
 */
class DecimalArcsinTest extends TestCase
{
    public function arcsinProvider() {
        // Some values provided by wolframalpha
        return [
            ['0.154', '0.15461530016096', 14],
            ['1', '1.57079632679489662', 17],
            ['-1', '-1.57079632679489662', 17],
        ];
    }

    /**
     * @dataProvider arcsinProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $arcsinX = $x->arcsin($digits);

        $this->assertTrue(
            Decimal::create($answer)->equals($arcsinX),
            "The answer must be " . $answer . ", but was " . $arcsinX
        );
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The arcsin of this number is undefined.
     */
    public function testArcsinGreaterThanOne()
    {
        Decimal::create('25.546')->arcsin();
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The arcsin of this number is undefined.
     */
    public function testArcsinFewerThanNegativeOne()
    {
        Decimal::create('-304.75')->arcsin();
    }
}
