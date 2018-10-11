The repo mirror from [Litipk/php-bignumbers](https://github.com/Litipk/php-bignumbers)

Since our project needs，I modify some logic:

## Support php 5.6
[Litipk/php-bignumbers], after 0.8.x version, requires php 7.x，and not support php 5.6。After Modified, it supports php 5.6.

## Throw an exception if Decimal‘s argument is Float type
In [Litipk/PHP-bignumbers], Decimal converts Float to string type, then uses string to compute through BCMath. However, the accuracy of Float conversion to string may also lead to precision loss(For Detail: https://www.sitepoint.com/fixed-point-math-php-bcmath-precision-loss-cases/). For Example:
````
Litipk/php-bignumbers:
echo Decimal::create(50018850776.2101)->innerValue() . PHP_EOL;

Result：
    50018850776.21
````
So deprecate the function Decimal::fromFloat(), throw an exception in Decimal::create() if the parameter is Float type.

## Add switch for exponential representation：ENABLE_EXP_NOTATION
if Decimal::ENABLE_EXP_NOTATION is true, argument can be a string of exponential representation.Otherwise， throw an exception.