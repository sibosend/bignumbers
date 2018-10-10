<?php
/**
 * Created by PhpStorm.
 * User: taoyun
 * Date: 2018/9/30
 * Time: 12:04
 */

namespace Sibosend\BigNumbers\Errors;


class InvalidArgumentTypeError extends \InvalidArgumentException implements BigNumbersError
{
    /**
     * List of expected types
     * @var array<string>
     */
    private $expected_types;

    /**
     * Given type
     * @var string
     */
    private $given_type;

    /**
     * @param array $expected_types The list of expected types for the problematic argument
     * @param mixed $given_value The value of the problematic argument
     * @param string $message See Exception definition
     * @param integer $code See Exception definition
     * @param Exception $previous See Exception definition
     */
    public function __construct($expected_types, $given_value, $message = "", $code = 0, \Exception $previous = null)
    {
        $given_type = is_object($given_value) ? get_class($given_value) : gettype($given_value);
        if (empty($message)) {
            if ($expected_types === null || empty($expected_types) || $given_type === null || !is_string($given_type)) {
                $message = "InvalidArgumentTypeError requires valid \$expected_types and \$given_type parameters.";
            } elseif (in_array($given_type, $expected_types)) {
                $message = "It's a nonsense to raise an InvalidArgumentTypeError when \$given_type is in \$expected_types.";
            } else {
                $message = "Invalid argument type:" . json_encode($given_value);
            }
        }
        $this->expected_types = $expected_types;
        $this->given_type = $given_type;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns the list of expected types
     *
     * @return array<string>
     */
    public function getExpectedTypes()
    {
        return $this->expected_types;
    }

    /**
     * Returns the given type
     *
     * @return string
     */
    public function getGivenType()
    {
        return $this->given_type;
    }
}
