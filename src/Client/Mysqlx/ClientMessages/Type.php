<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages;

/**
 * Protobuf enum : Mysqlx.ClientMessages.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Type extends \Protobuf\Enum
{

    /**
     * CON_CAPABILITIES_GET = 1
     */
    const CON_CAPABILITIES_GET_VALUE = 1;

    /**
     * CON_CAPABILITIES_SET = 2
     */
    const CON_CAPABILITIES_SET_VALUE = 2;

    /**
     * CON_CLOSE = 3
     */
    const CON_CLOSE_VALUE = 3;

    /**
     * SESS_AUTHENTICATE_START = 4
     */
    const SESS_AUTHENTICATE_START_VALUE = 4;

    /**
     * SESS_AUTHENTICATE_CONTINUE = 5
     */
    const SESS_AUTHENTICATE_CONTINUE_VALUE = 5;

    /**
     * SESS_RESET = 6
     */
    const SESS_RESET_VALUE = 6;

    /**
     * SESS_CLOSE = 7
     */
    const SESS_CLOSE_VALUE = 7;

    /**
     * SQL_STMT_EXECUTE = 12
     */
    const SQL_STMT_EXECUTE_VALUE = 12;

    /**
     * CRUD_FIND = 17
     */
    const CRUD_FIND_VALUE = 17;

    /**
     * CRUD_INSERT = 18
     */
    const CRUD_INSERT_VALUE = 18;

    /**
     * CRUD_UPDATE = 19
     */
    const CRUD_UPDATE_VALUE = 19;

    /**
     * CRUD_DELETE = 20
     */
    const CRUD_DELETE_VALUE = 20;

    /**
     * EXPECT_OPEN = 24
     */
    const EXPECT_OPEN_VALUE = 24;

    /**
     * EXPECT_CLOSE = 25
     */
    const EXPECT_CLOSE_VALUE = 25;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CON_CAPABILITIES_GET = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CON_CAPABILITIES_SET = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CON_CLOSE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $SESS_AUTHENTICATE_START = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $SESS_AUTHENTICATE_CONTINUE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $SESS_RESET = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $SESS_CLOSE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $SQL_STMT_EXECUTE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CRUD_FIND = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CRUD_INSERT = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CRUD_UPDATE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $CRUD_DELETE = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $EXPECT_OPEN = null;

    /**
     * @var \Mysqlx\ClientMessages\Type
     */
    protected static $EXPECT_CLOSE = null;

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CON_CAPABILITIES_GET()
    {
        if (self::$CON_CAPABILITIES_GET !== null) {
            return self::$CON_CAPABILITIES_GET;
        }

        return self::$CON_CAPABILITIES_GET = new self('CON_CAPABILITIES_GET', self::CON_CAPABILITIES_GET_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CON_CAPABILITIES_SET()
    {
        if (self::$CON_CAPABILITIES_SET !== null) {
            return self::$CON_CAPABILITIES_SET;
        }

        return self::$CON_CAPABILITIES_SET = new self('CON_CAPABILITIES_SET', self::CON_CAPABILITIES_SET_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CON_CLOSE()
    {
        if (self::$CON_CLOSE !== null) {
            return self::$CON_CLOSE;
        }

        return self::$CON_CLOSE = new self('CON_CLOSE', self::CON_CLOSE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function SESS_AUTHENTICATE_START()
    {
        if (self::$SESS_AUTHENTICATE_START !== null) {
            return self::$SESS_AUTHENTICATE_START;
        }

        return self::$SESS_AUTHENTICATE_START = new self('SESS_AUTHENTICATE_START', self::SESS_AUTHENTICATE_START_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function SESS_AUTHENTICATE_CONTINUE()
    {
        if (self::$SESS_AUTHENTICATE_CONTINUE !== null) {
            return self::$SESS_AUTHENTICATE_CONTINUE;
        }

        return self::$SESS_AUTHENTICATE_CONTINUE = new self('SESS_AUTHENTICATE_CONTINUE', self::SESS_AUTHENTICATE_CONTINUE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function SESS_RESET()
    {
        if (self::$SESS_RESET !== null) {
            return self::$SESS_RESET;
        }

        return self::$SESS_RESET = new self('SESS_RESET', self::SESS_RESET_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function SESS_CLOSE()
    {
        if (self::$SESS_CLOSE !== null) {
            return self::$SESS_CLOSE;
        }

        return self::$SESS_CLOSE = new self('SESS_CLOSE', self::SESS_CLOSE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function SQL_STMT_EXECUTE()
    {
        if (self::$SQL_STMT_EXECUTE !== null) {
            return self::$SQL_STMT_EXECUTE;
        }

        return self::$SQL_STMT_EXECUTE = new self('SQL_STMT_EXECUTE', self::SQL_STMT_EXECUTE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CRUD_FIND()
    {
        if (self::$CRUD_FIND !== null) {
            return self::$CRUD_FIND;
        }

        return self::$CRUD_FIND = new self('CRUD_FIND', self::CRUD_FIND_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CRUD_INSERT()
    {
        if (self::$CRUD_INSERT !== null) {
            return self::$CRUD_INSERT;
        }

        return self::$CRUD_INSERT = new self('CRUD_INSERT', self::CRUD_INSERT_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CRUD_UPDATE()
    {
        if (self::$CRUD_UPDATE !== null) {
            return self::$CRUD_UPDATE;
        }

        return self::$CRUD_UPDATE = new self('CRUD_UPDATE', self::CRUD_UPDATE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function CRUD_DELETE()
    {
        if (self::$CRUD_DELETE !== null) {
            return self::$CRUD_DELETE;
        }

        return self::$CRUD_DELETE = new self('CRUD_DELETE', self::CRUD_DELETE_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function EXPECT_OPEN()
    {
        if (self::$EXPECT_OPEN !== null) {
            return self::$EXPECT_OPEN;
        }

        return self::$EXPECT_OPEN = new self('EXPECT_OPEN', self::EXPECT_OPEN_VALUE);
    }

    /**
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function EXPECT_CLOSE()
    {
        if (self::$EXPECT_CLOSE !== null) {
            return self::$EXPECT_CLOSE;
        }

        return self::$EXPECT_CLOSE = new self('EXPECT_CLOSE', self::EXPECT_CLOSE_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\ClientMessages\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::CON_CAPABILITIES_GET();
            case 2:
                return self::CON_CAPABILITIES_SET();
            case 3:
                return self::CON_CLOSE();
            case 4:
                return self::SESS_AUTHENTICATE_START();
            case 5:
                return self::SESS_AUTHENTICATE_CONTINUE();
            case 6:
                return self::SESS_RESET();
            case 7:
                return self::SESS_CLOSE();
            case 12:
                return self::SQL_STMT_EXECUTE();
            case 17:
                return self::CRUD_FIND();
            case 18:
                return self::CRUD_INSERT();
            case 19:
                return self::CRUD_UPDATE();
            case 20:
                return self::CRUD_DELETE();
            case 24:
                return self::EXPECT_OPEN();
            case 25:
                return self::EXPECT_CLOSE();
            default:
                return null;
        }
    }
}
