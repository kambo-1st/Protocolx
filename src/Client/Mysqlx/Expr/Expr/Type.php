<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr;

/**
 * Protobuf enum : Mysqlx.Expr.Expr.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Type extends \Protobuf\Enum
{

    /**
     * IDENT = 1
     */
    const IDENT_VALUE = 1;

    /**
     * LITERAL = 2
     */
    const LITERAL_VALUE = 2;

    /**
     * VARIABLE = 3
     */
    const VARIABLE_VALUE = 3;

    /**
     * FUNC_CALL = 4
     */
    const FUNC_CALL_VALUE = 4;

    /**
     * OPERATOR = 5
     */
    const OPERATOR_VALUE = 5;

    /**
     * PLACEHOLDER = 6
     */
    const PLACEHOLDER_VALUE = 6;

    /**
     * OBJECT = 7
     */
    const OBJECT_VALUE = 7;

    /**
     * ARRAY = 8
     */
    const ARRAY_VALUE = 8;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $IDENT = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $LITERAL = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $VARIABLE = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $FUNC_CALL = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $OPERATOR = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $PLACEHOLDER = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $OBJECT = null;

    /**
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected static $ARRAY = null;

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function IDENT()
    {
        if (self::$IDENT !== null) {
            return self::$IDENT;
        }

        return self::$IDENT = new self('IDENT', self::IDENT_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function LITERAL()
    {
        if (self::$LITERAL !== null) {
            return self::$LITERAL;
        }

        return self::$LITERAL = new self('LITERAL', self::LITERAL_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function VARIABLE()
    {
        if (self::$VARIABLE !== null) {
            return self::$VARIABLE;
        }

        return self::$VARIABLE = new self('VARIABLE', self::VARIABLE_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function FUNC_CALL()
    {
        if (self::$FUNC_CALL !== null) {
            return self::$FUNC_CALL;
        }

        return self::$FUNC_CALL = new self('FUNC_CALL', self::FUNC_CALL_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function OPERATOR()
    {
        if (self::$OPERATOR !== null) {
            return self::$OPERATOR;
        }

        return self::$OPERATOR = new self('OPERATOR', self::OPERATOR_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function PLACEHOLDER()
    {
        if (self::$PLACEHOLDER !== null) {
            return self::$PLACEHOLDER;
        }

        return self::$PLACEHOLDER = new self('PLACEHOLDER', self::PLACEHOLDER_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function OBJECT()
    {
        if (self::$OBJECT !== null) {
            return self::$OBJECT;
        }

        return self::$OBJECT = new self('OBJECT', self::OBJECT_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function ARRAYOBJECT()
    {
        if (self::$ARRAY !== null) {
            return self::$ARRAY;
        }

        return self::$ARRAY = new self('ARRAY', self::ARRAY_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Expr\Expr\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::IDENT();
            case 2:
                return self::LITERAL();
            case 3:
                return self::VARIABLE();
            case 4:
                return self::FUNC_CALL();
            case 5:
                return self::OPERATOR();
            case 6:
                return self::PLACEHOLDER();
            case 7:
                return self::OBJECT();
            case 8:
                return self::ARRAYOBJECT();
            default:
                return null;
        }
    }
}
