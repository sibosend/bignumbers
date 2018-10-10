<?php
declare(strict_types=1);

use Sibosend\BigNumbers\Decimal as Decimal;
use PHPUnit\Framework\TestCase;

\date_default_timezone_set('UTC');

class DecimalFromIntegerTest extends TestCase
{
    /**
     * @expectedException Sibosend\BigNumbers\Errors\InvalidArgumentTypeError
     */
    public function testNoInteger()
    {
        Decimal::create(5.1);
    }
}
