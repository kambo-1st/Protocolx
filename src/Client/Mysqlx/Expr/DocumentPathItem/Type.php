<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem;

/**
 * Protobuf enum : Mysqlx.Expr.DocumentPathItem.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Type extends \Protobuf\Enum
{

    /**
     * MEMBER = 1
     */
    const MEMBER_VALUE = 1;

    /**
     * MEMBER_ASTERISK = 2
     */
    const MEMBER_ASTERISK_VALUE = 2;

    /**
     * ARRAY_INDEX = 3
     */
    const ARRAY_INDEX_VALUE = 3;

    /**
     * ARRAY_INDEX_ASTERISK = 4
     */
    const ARRAY_INDEX_ASTERISK_VALUE = 4;

    /**
     * DOUBLE_ASTERISK = 5
     */
    const DOUBLE_ASTERISK_VALUE = 5;

    /**
     * @var \Mysqlx\Expr\DocumentPathItem\Type
     */
    protected static $MEMBER = null;

    /**
     * @var \Mysqlx\Expr\DocumentPathItem\Type
     */
    protected static $MEMBER_ASTERISK = null;

    /**
     * @var \Mysqlx\Expr\DocumentPathItem\Type
     */
    protected static $ARRAY_INDEX = null;

    /**
     * @var \Mysqlx\Expr\DocumentPathItem\Type
     */
    protected static $ARRAY_INDEX_ASTERISK = null;

    /**
     * @var \Mysqlx\Expr\DocumentPathItem\Type
     */
    protected static $DOUBLE_ASTERISK = null;

    /**
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function MEMBER()
    {
        if (self::$MEMBER !== null) {
            return self::$MEMBER;
        }

        return self::$MEMBER = new self('MEMBER', self::MEMBER_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function MEMBER_ASTERISK()
    {
        if (self::$MEMBER_ASTERISK !== null) {
            return self::$MEMBER_ASTERISK;
        }

        return self::$MEMBER_ASTERISK = new self('MEMBER_ASTERISK', self::MEMBER_ASTERISK_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function ARRAY_INDEX()
    {
        if (self::$ARRAY_INDEX !== null) {
            return self::$ARRAY_INDEX;
        }

        return self::$ARRAY_INDEX = new self('ARRAY_INDEX', self::ARRAY_INDEX_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function ARRAY_INDEX_ASTERISK()
    {
        if (self::$ARRAY_INDEX_ASTERISK !== null) {
            return self::$ARRAY_INDEX_ASTERISK;
        }

        return self::$ARRAY_INDEX_ASTERISK = new self('ARRAY_INDEX_ASTERISK', self::ARRAY_INDEX_ASTERISK_VALUE);
    }

    /**
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function DOUBLE_ASTERISK()
    {
        if (self::$DOUBLE_ASTERISK !== null) {
            return self::$DOUBLE_ASTERISK;
        }

        return self::$DOUBLE_ASTERISK = new self('DOUBLE_ASTERISK', self::DOUBLE_ASTERISK_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Expr\DocumentPathItem\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::MEMBER();
            case 2:
                return self::MEMBER_ASTERISK();
            case 3:
                return self::ARRAY_INDEX();
            case 4:
                return self::ARRAY_INDEX_ASTERISK();
            case 5:
                return self::DOUBLE_ASTERISK();
            default:
                return null;
        }
    }
}
