<?php
declare(strict_types = 1);

namespace Sibosend\BigNumbers;

use Sibosend\BigNumbers\Decimal as Decimal;
use Sibosend\BigNumbers\Errors\InvalidArgumentTypeError;

/**
 * Class that holds many important numeric constants
 *
 * @author Andreu Correa Casablanca <castarco@litipk.com>
 */
final class DecimalConstants
{
    /** @var Decimal */
    private static $ZERO = null;
    /** @var Decimal */
    private static $ONE = null;
    /** @var Decimal */
    private static $NEGATIVE_ONE = null;

    /** @var Decimal */
    private static $PI = null;
    /** @var Decimal */
    private static $EulerMascheroni = null;

    /** @var Decimal */
    private static $GoldenRatio = null;
    /** @var Decimal */
    private static $SilverRatio = null;
    /** @var Decimal */
    private static $LightSpeed = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function zero()
    {
        if (null === self::$ZERO) {
            self::$ZERO = Decimal::create(0);
        }
        return self::$ZERO;
    }

    public static function one()
    {
        if (null === self::$ONE) {
            self::$ONE = Decimal::create(1);
        }
        return self::$ONE;
    }

    public static function negativeOne()
    {
        if (null === self::$NEGATIVE_ONE) {
            self::$NEGATIVE_ONE = Decimal::create(-1);
        }
        return self::$NEGATIVE_ONE;
    }

    /**
     * Returns the Pi number.
     * @return Decimal
     */
    public static function pi()
    {
        if (null === self::$PI) {
            self::$PI = Decimal::create(
                "3.14159265358979323846264338327950"
            );
        }
        return self::$PI;
    }

    /**
     * Returns the Euler's E number.
     * @param  integer $scale
     * @return Decimal
     */
    public static function e($scale = 32)
    {
        if (!is_int($scale)) {
            throw new InvalidArgumentTypeError(['integer'], $scale);
        }
        if ($scale < 0) {
            throw new InvalidArgumentTypeError(null, $scale, "\$scale must be positive.");
        }

        return self::$ONE->exp($scale);
    }

    /**
     * Returns the Euler-Mascheroni constant.
     * @return Decimal
     */
    public static function eulerMascheroni()
    {
        if (null === self::$EulerMascheroni) {
            self::$EulerMascheroni = Decimal::create(
                "0.57721566490153286060651209008240"
            );
        }
        return self::$EulerMascheroni;
    }

    /**
     * Returns the Golden Ration, also named Phi.
     * @return Decimal
     */
    public static function goldenRatio()
    {
        if (null === self::$GoldenRatio) {
            self::$GoldenRatio = Decimal::create(
                "1.61803398874989484820458683436564"
            );
        }
        return self::$GoldenRatio;
    }

    /**
     * Returns the Silver Ratio.
     * @return Decimal
     */
    public static function silverRatio()
    {
        if (null === self::$SilverRatio) {
            self::$SilverRatio = Decimal::create(
                "2.41421356237309504880168872420970"
            );
        }
        return self::$SilverRatio;
    }

    /**
     * Returns the Light of Speed measured in meters / second.
     * @return Decimal
     */
    public static function lightSpeed()
    {
        if (null === self::$LightSpeed) {
            self::$LightSpeed = Decimal::create(299792458);
        }
        return self::$LightSpeed;
    }
}
