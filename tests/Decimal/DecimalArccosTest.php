<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group arccos
 */
class DecimalArccosTest extends TestCase
{
    public function arccosProvider() {
        // Some values provided by wolframalpha
        return [
            ['0.154', '1.41618102663394', 14],
            ['1', '0', 17],
            ['-1', '3.14159265358979324', 17],
        ];
    }

    /**
     * @dataProvider arccosProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $arccosX = $x->arccos($digits);

        $this->assertTrue(
            Decimal::create($answer)->equals($arccosX),
            "The answer must be " . $answer . ", but was " . $arccosX
        );
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The arccos of this number is undefined.
     */
    public function testArcosGreaterThanOne()
    {
        Decimal::create('25.546')->arccos();
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The arccos of this number is undefined.
     */
    public function testArccosFewerThanNegativeOne()
    {
        Decimal::create('-304.75')->arccos();
    }
}
