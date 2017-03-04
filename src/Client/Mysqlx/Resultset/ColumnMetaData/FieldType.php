<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Resultset\ColumnMetaData;

/**
 * Protobuf message : Mysqlx.Resultset.ColumnMetaData.FieldType
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Resultset\ColumnMetaData
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class FieldType extends \Protobuf\Enum
{

    /**
     * SINT = 1
     */
    const SINT_VALUE = 1;

    /**
     * UINT = 2
     */
    const UINT_VALUE = 2;

    /**
     * DOUBLE = 5
     */
    const DOUBLE_VALUE = 5;

    /**
     * FLOAT = 6
     */
    const FLOAT_VALUE = 6;

    /**
     * BYTES = 7
     */
    const BYTES_VALUE = 7;

    /**
     * TIME = 10
     */
    const TIME_VALUE = 10;

    /**
     * DATETIME = 12
     */
    const DATETIME_VALUE = 12;

    /**
     * SET = 15
     */
    const SET_VALUE = 15;

    /**
     * ENUM = 16
     */
    const ENUM_VALUE = 16;

    /**
     * BIT = 17
     */
    const BIT_VALUE = 17;

    /**
     * DECIMAL = 18
     */
    const DECIMAL_VALUE = 18;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $SINT = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $UINT = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $DOUBLE = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $FLOAT = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $BYTES = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $TIME = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $DATETIME = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $SET = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $ENUM = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $BIT = null;

    /**
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected static $DECIMAL = null;

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function SINT()
    {
        if (self::$SINT !== null) {
            return self::$SINT;
        }

        return self::$SINT = new self('SINT', self::SINT_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function UINT()
    {
        if (self::$UINT !== null) {
            return self::$UINT;
        }

        return self::$UINT = new self('UINT', self::UINT_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function DOUBLE()
    {
        if (self::$DOUBLE !== null) {
            return self::$DOUBLE;
        }

        return self::$DOUBLE = new self('DOUBLE', self::DOUBLE_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function FLOAT()
    {
        if (self::$FLOAT !== null) {
            return self::$FLOAT;
        }

        return self::$FLOAT = new self('FLOAT', self::FLOAT_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function BYTES()
    {
        if (self::$BYTES !== null) {
            return self::$BYTES;
        }

        return self::$BYTES = new self('BYTES', self::BYTES_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function TIME()
    {
        if (self::$TIME !== null) {
            return self::$TIME;
        }

        return self::$TIME = new self('TIME', self::TIME_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function DATETIME()
    {
        if (self::$DATETIME !== null) {
            return self::$DATETIME;
        }

        return self::$DATETIME = new self('DATETIME', self::DATETIME_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function SET()
    {
        if (self::$SET !== null) {
            return self::$SET;
        }

        return self::$SET = new self('SET', self::SET_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function ENUM()
    {
        if (self::$ENUM !== null) {
            return self::$ENUM;
        }

        return self::$ENUM = new self('ENUM', self::ENUM_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function BIT()
    {
        if (self::$BIT !== null) {
            return self::$BIT;
        }

        return self::$BIT = new self('BIT', self::BIT_VALUE);
    }

    /**
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function DECIMAL()
    {
        if (self::$DECIMAL !== null) {
            return self::$DECIMAL;
        }

        return self::$DECIMAL = new self('DECIMAL', self::DECIMAL_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::SINT();
            case 2:
                return self::UINT();
            case 5:
                return self::DOUBLE();
            case 6:
                return self::FLOAT();
            case 7:
                return self::BYTES();
            case 10:
                return self::TIME();
            case 12:
                return self::DATETIME();
            case 15:
                return self::SET();
            case 16:
                return self::ENUM();
            case 17:
                return self::BIT();
            case 18:
                return self::DECIMAL();
            default:
                return null;
        }
    }
}
