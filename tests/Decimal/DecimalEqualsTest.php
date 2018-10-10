<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalEqualsTest extends TestCase
{
    public function testSimpleEquals()
    {
        // Transitivity & inter-types constructors compatibility
        $this->assertTrue(Decimal::create(1)->equals(Decimal::create("1")));
        $this->assertTrue(Decimal::create("1")->equals(Decimal::create('1.0')));
        $this->assertTrue(Decimal::create(1)->equals(Decimal::create('1.0')));

        // Reflexivity
        $this->assertTrue(Decimal::create(1)->equals(Decimal::create(1)));

        // Symmetry
        $this->assertTrue(Decimal::create("1")->equals(Decimal::create(1)));
        $this->assertTrue(Decimal::create('1.0')->equals(Decimal::create("1")));
        $this->assertTrue(Decimal::create('1.0')->equals(Decimal::create(1)));
    }

    public function testSimpleNotEquals()
    {
        // Symmetry
        $this->assertFalse(Decimal::create(1)->equals(Decimal::create(2)));
        $this->assertFalse(Decimal::create(2)->equals(Decimal::create(1)));

        $this->assertFalse(Decimal::create('1.01')->equals(Decimal::create(1)));
        $this->assertFalse(Decimal::create(1)->equals(Decimal::create('1.01')));
    }

    public function testScaledEquals()
    {
        // Transitivity
        $this->assertTrue(Decimal::create('1.001')->equals(Decimal::create('1.01'), 1));
        $this->assertTrue(Decimal::create('1.001')->equals(Decimal::create('1.004'), 1));
        $this->assertTrue(Decimal::create('1.001')->equals(Decimal::create('1.004'), 1));

        // Reflexivity
        $this->assertTrue(Decimal::create('1.00525')->equals(Decimal::create('1.00525'), 2));

        // Symmetry
        $this->assertTrue(Decimal::create('1.01')->equals(Decimal::create('1.001'), 1));
        $this->assertTrue(Decimal::create('1.004')->equals(Decimal::create('1.01'), 1));
        $this->assertTrue(Decimal::create('1.004')->equals(Decimal::create('1.001'), 1));

        // Proper rounding
        $this->assertTrue(Decimal::create('1.004')->equals(Decimal::create('1.000'), 2));

        // Warning, float to Decimal conversion can have unexpected behaviors, like converting
        // 1.005 to Decimal("1.0049999999999999")
        $this->assertTrue(Decimal::create('1.0050000000001')->equals(Decimal::create('1.010'), 2));

        $this->assertTrue(Decimal::create("1.005")->equals(Decimal::create("1.010"), 2));
    }

    public function testScaledNotEquals()
    {
        # Proper rounding
        $this->assertFalse(Decimal::create('1.004')->equals(Decimal::create('1.0050000000001'), 2));
    }
}
