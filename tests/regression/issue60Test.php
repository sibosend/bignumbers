<?php

declare(strict_types=1);

use Sibosend\BigNumbers\Decimal;
use PHPUnit\Framework\TestCase;

class issue60Test extends TestCase
{
    public function test_that_fromFloat_division_does_not_calculate_invalid_log10_avoiding_div_zero()
    {
        $value = Decimal::create('1.001');
        $divisor = Decimal::create(20);

        $this->assertEquals(0.05005, $value->div($divisor)->asFloat());
        $this->assertEquals(0.000434077479319, $value->log10()->asFloat());
    }

    public function test_that_fromFloat_less_than_1_still_correct()
    {
        $value = Decimal::create('0.175');
        $divisor = Decimal::create(20);

        $this->assertEquals(0.00875, $value->div($divisor)->asFloat());
        $this->assertEquals(-0.7569, $value->log10()->asFloat());
    }
}
