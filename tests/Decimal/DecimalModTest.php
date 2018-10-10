<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

/**
 * @group mod
 */
class DecimalModTest extends TestCase
{
    public function modProvider() {
        return [
            ['10', '3', '1'],
            ['34', '3.4', '0'],
            ['15.1615', '3.156156', '2.536876'],
            ['15.1615', '3.156156', '2.5369', 4],
            ['-3.4', '-2', '-1.4'],
            ['3.4', '-2', '-0.6'],
            ['-3.4', '2', '0.6']
        ];
    }
    /**
     * @dataProvider modProvider
     */
    public function testFiniteFiniteMod($number, $mod, $answer, $scale = null) {
        $numberDec = Decimal::create($number);
        $modDec = Decimal::create($mod);
        $decimalAnswer = $numberDec->mod($modDec, $scale);

        $this->assertTrue(
            Decimal::create($answer)->equals($decimalAnswer),
            $decimalAnswer . ' % ' . $mod . ' must be equal to ' . $answer . ', but was ' . $decimalAnswer
        );
    }
}
