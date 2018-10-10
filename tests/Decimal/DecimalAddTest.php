<?php

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

date_default_timezone_set('UTC');

class DecimalAddTest extends TestCase
{
    public function testZeroAdd()
    {
        $z = Decimal::create(0);
        $n = Decimal::create(5);

        $this->assertTrue($z->add($n)->equals($n));
        $this->assertTrue($n->add($z)->equals($n));
    }

    public function testPositivePositiveDecimalAdd()
    {
        $n1 = Decimal::create('3.45');
        $n2 = Decimal::create('7.67');

        $this->assertTrue($n1->add($n2)->equals(Decimal::create('11.12')));
        $this->assertTrue($n2->add($n1)->equals(Decimal::create('11.12')));
    }

    public function testNegativenegativeDecimalAdd()
    {
        $n1 = Decimal::create('-3.45');
        $n2 = Decimal::create('-7.67');

        $this->assertTrue($n1->add($n2)->equals(Decimal::create('-11.12')));
        $this->assertTrue($n2->add($n1)->equals(Decimal::create('-11.12')));
    }

    public function testPositiveNegativeDecimalAdd()
    {
        $n1 = Decimal::create('3.45');
        $n2 = Decimal::create('-7.67');

        $this->assertTrue($n1->add($n2)->equals(Decimal::create('-4.22')));
        $this->assertTrue($n2->add($n1)->equals(Decimal::create('-4.22')));
    }
}
