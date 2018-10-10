<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group arccot
 */
class DecimalArccotTest extends TestCase
{
    public function arccotProvider() {
        // Some values provided by wolframalpha
        return [
            ['0.154', '1.41799671285823', 14],
            ['0', '1.57079632679489662', 17],
            ['-1', '-0.78540', 5],
        ];
    }

    /**
     * @dataProvider arccotProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $arccotX = $x->arccot($digits);

        $this->assertTrue(
            Decimal::create($answer)->equals($arccotX),
            "The answer must be " . $answer . ", but was " . $arccotX
        );
    }

}
