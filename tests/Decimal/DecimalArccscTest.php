<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group arccsc
 */
class DecimalArccscTest extends TestCase
{
    public function arccscProvider() {
        // Some values provided by wolframalpha
        return [
            ['25.546', '0.03915507577327', 14],
            ['1.5', '0.729728', 6],
            ['1', '1.57079632679489662', 17],
            ['-1', '-1.57079632679489662', 17],
        ];
    }

    /**
     * @dataProvider arccscProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $arccscX = $x->arccsc($digits);

        $this->assertTrue(
            Decimal::create($answer)->equals($arccscX),
            "The answer must be " . $answer . ", but was " . $arccscX
        );
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The arccosecant of this number is undefined.
     */
    public function testArccscBetweenOneAndNegativeOne()
    {
        Decimal::create('0.546')->arccsc();
    }
}
