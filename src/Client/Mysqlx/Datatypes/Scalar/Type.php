<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar;

/**
 * Protobuf enum : Mysqlx.Datatypes.Scalar.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Type extends \Protobuf\Enum
{

    /**
     * V_SINT = 1
     */
    const V_SINT_VALUE = 1;

    /**
     * V_UINT = 2
     */
    const V_UINT_VALUE = 2;

    /**
     * V_NULL = 3
     */
    const V_NULL_VALUE = 3;

    /**
     * V_OCTETS = 4
     */
    const V_OCTETS_VALUE = 4;

    /**
     * V_DOUBLE = 5
     */
    const V_DOUBLE_VALUE = 5;

    /**
     * V_FLOAT = 6
     */
    const V_FLOAT_VALUE = 6;

    /**
     * V_BOOL = 7
     */
    const V_BOOL_VALUE = 7;

    /**
     * V_STRING = 8
     */
    const V_STRING_VALUE = 8;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_SINT = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_UINT = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_NULL = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_OCTETS = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_DOUBLE = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_FLOAT = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_BOOL = null;

    /**
     * @var \Mysqlx\Datatypes\Scalar\Type
     */
    protected static $V_STRING = null;

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_SINT()
    {
        if (self::$V_SINT !== null) {
            return self::$V_SINT;
        }

        return self::$V_SINT = new self('V_SINT', self::V_SINT_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_UINT()
    {
        if (self::$V_UINT !== null) {
            return self::$V_UINT;
        }

        return self::$V_UINT = new self('V_UINT', self::V_UINT_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_NULL()
    {
        if (self::$V_NULL !== null) {
            return self::$V_NULL;
        }

        return self::$V_NULL = new self('V_NULL', self::V_NULL_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_OCTETS()
    {
        if (self::$V_OCTETS !== null) {
            return self::$V_OCTETS;
        }

        return self::$V_OCTETS = new self('V_OCTETS', self::V_OCTETS_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_DOUBLE()
    {
        if (self::$V_DOUBLE !== null) {
            return self::$V_DOUBLE;
        }

        return self::$V_DOUBLE = new self('V_DOUBLE', self::V_DOUBLE_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_FLOAT()
    {
        if (self::$V_FLOAT !== null) {
            return self::$V_FLOAT;
        }

        return self::$V_FLOAT = new self('V_FLOAT', self::V_FLOAT_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_BOOL()
    {
        if (self::$V_BOOL !== null) {
            return self::$V_BOOL;
        }

        return self::$V_BOOL = new self('V_BOOL', self::V_BOOL_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function V_STRING()
    {
        if (self::$V_STRING !== null) {
            return self::$V_STRING;
        }

        return self::$V_STRING = new self('V_STRING', self::V_STRING_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Datatypes\Scalar\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::V_SINT();
            case 2:
                return self::V_UINT();
            case 3:
                return self::V_NULL();
            case 4:
                return self::V_OCTETS();
            case 5:
                return self::V_DOUBLE();
            case 6:
                return self::V_FLOAT();
            case 7:
                return self::V_BOOL();
            case 8:
                return self::V_STRING();
            default:
                return null;
        }
    }
}
