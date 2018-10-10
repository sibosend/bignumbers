<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use Sibosend\BigNumbers\DecimalConstants as DecimalConstants;
use PHPUnit\Framework\TestCase;

/**
 * @group cotan
 */
class DecimalCotanTest extends TestCase
{
    public function cotanProvider() {
        // Some values providede by mathematica
        return [
            ['1', '0.64209261593433', 14],
            ['123.123', '1.45891895739232371', 17],
            ['15000000000', '-1.04405948230055701685', 20]
        ];
    }

    /**
     * @dataProvider cotanProvider
     */
    public function testSimple($nr, $answer, $digits)
    {
        $x = Decimal::create($nr);
        $cotanX = $x->cotan($digits);
        $this->assertTrue(
            Decimal::create($answer)->equals($cotanX),
            'cotan('.$nr.') must be equal to '.$answer.', but was '.$cotanX
        );
    }
    
    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage The cotangent of this 'angle' is undefined.
     */
    public function testCotanPiDiv()
    {    	
        $PI  = DecimalConstants::PI();
        $PI->cotan();
    }
    
}