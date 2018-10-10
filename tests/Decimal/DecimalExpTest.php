<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group cos
 */
class DecimalExpTest extends TestCase
{
    public function expProvider() {
        // Some values provided by Mathematica
        return [
            ['0', '1', 0],
            ['0', '1', 1],
            ['0', '1', 2],

            ['1', '3', 0],
            ['1', '2.7', 1],
            ['1', '2.72', 2],
            ['1', '2.718', 3],

            ['-1', '0', 0],
            ['-1', '0.4', 1],
            ['-1', '0.37', 2]
        ];
    }

    /**
     * @dataProvider expProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $expX = $x->exp((int)$digits);

        $this->assertTrue(
            Decimal::create($answer)->equals($expX),
            "The answer must be " . $answer . ", but was " . $expX
        );
    }
}
