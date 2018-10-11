由于项目的需要，对[Litipk/php-bignumbers](https://github.com/Litipk/php-bignumbers)的部分逻辑进行了修改：

## 支持php5.6以上
[Litipk/php-bignumbers] 0.8.x版本后需要php7.x，不支持php5.6。修改后支持php5.6

## Float类型不能参与运算，Decimal转化Float类型时抛出异常
[Litipk/php-bignumbers]处理Float运算时，将Float转为了string类型，然后使用string通过BCMath进行计算。但Float转string过程中也可能损失精度(详情：https://www.sitepoint.com/fixed-point-math-php-bcmath-precision-loss-cases/)。如：
````
Litipk/php-bignumbers中:
echo Decimal::create(50018850776.2101)->innerValue() . PHP_EOL;

结果为:
    50018850776.21
````
因此改为Decimal::fromFloat()废弃，Decimal::create()传参为Float类型时抛出异常。

## 增加指数运算开关ENABLE_EXP_NOTATION
设置ENABLE_EXP_NOTATION为true时，才能传入指数表示形式的字符串运算。否则抛出异常。

