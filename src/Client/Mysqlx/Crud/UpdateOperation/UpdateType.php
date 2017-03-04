<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud\UpdateOperation;

/**
 * Protobuf enum : Mysqlx.Crud.UpdateOperation.UpdateType
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud\UpdateOperation
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class UpdateType extends \Protobuf\Enum
{

    /**
     * SET = 1
     */
    const SET_VALUE = 1;

    /**
     * ITEM_REMOVE = 2
     */
    const ITEM_REMOVE_VALUE = 2;

    /**
     * ITEM_SET = 3
     */
    const ITEM_SET_VALUE = 3;

    /**
     * ITEM_REPLACE = 4
     */
    const ITEM_REPLACE_VALUE = 4;

    /**
     * ITEM_MERGE = 5
     */
    const ITEM_MERGE_VALUE = 5;

    /**
     * ARRAY_INSERT = 6
     */
    const ARRAY_INSERT_VALUE = 6;

    /**
     * ARRAY_APPEND = 7
     */
    const ARRAY_APPEND_VALUE = 7;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $SET = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ITEM_REMOVE = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ITEM_SET = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ITEM_REPLACE = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ITEM_MERGE = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ARRAY_INSERT = null;

    /**
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected static $ARRAY_APPEND = null;

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function SET()
    {
        if (self::$SET !== null) {
            return self::$SET;
        }

        return self::$SET = new self('SET', self::SET_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ITEM_REMOVE()
    {
        if (self::$ITEM_REMOVE !== null) {
            return self::$ITEM_REMOVE;
        }

        return self::$ITEM_REMOVE = new self('ITEM_REMOVE', self::ITEM_REMOVE_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ITEM_SET()
    {
        if (self::$ITEM_SET !== null) {
            return self::$ITEM_SET;
        }

        return self::$ITEM_SET = new self('ITEM_SET', self::ITEM_SET_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ITEM_REPLACE()
    {
        if (self::$ITEM_REPLACE !== null) {
            return self::$ITEM_REPLACE;
        }

        return self::$ITEM_REPLACE = new self('ITEM_REPLACE', self::ITEM_REPLACE_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ITEM_MERGE()
    {
        if (self::$ITEM_MERGE !== null) {
            return self::$ITEM_MERGE;
        }

        return self::$ITEM_MERGE = new self('ITEM_MERGE', self::ITEM_MERGE_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ARRAY_INSERT()
    {
        if (self::$ARRAY_INSERT !== null) {
            return self::$ARRAY_INSERT;
        }

        return self::$ARRAY_INSERT = new self('ARRAY_INSERT', self::ARRAY_INSERT_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function ARRAY_APPEND()
    {
        if (self::$ARRAY_APPEND !== null) {
            return self::$ARRAY_APPEND;
        }

        return self::$ARRAY_APPEND = new self('ARRAY_APPEND', self::ARRAY_APPEND_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::SET();
            case 2:
                return self::ITEM_REMOVE();
            case 3:
                return self::ITEM_SET();
            case 4:
                return self::ITEM_REPLACE();
            case 5:
                return self::ITEM_MERGE();
            case 6:
                return self::ARRAY_INSERT();
            case 7:
                return self::ARRAY_APPEND();
            default:
                return null;
        }
    }
}
