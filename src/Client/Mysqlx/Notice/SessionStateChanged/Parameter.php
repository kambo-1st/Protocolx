<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice\SessionStateChanged;

/**
 * Protobuf enum : Mysqlx.Notice.SessionStateChanged.Parameter
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Parameter extends \Protobuf\Enum
{

    /**
     * CURRENT_SCHEMA = 1
     */
    const CURRENT_SCHEMA_VALUE = 1;

    /**
     * ACCOUNT_EXPIRED = 2
     */
    const ACCOUNT_EXPIRED_VALUE = 2;

    /**
     * GENERATED_INSERT_ID = 3
     */
    const GENERATED_INSERT_ID_VALUE = 3;

    /**
     * ROWS_AFFECTED = 4
     */
    const ROWS_AFFECTED_VALUE = 4;

    /**
     * ROWS_FOUND = 5
     */
    const ROWS_FOUND_VALUE = 5;

    /**
     * ROWS_MATCHED = 6
     */
    const ROWS_MATCHED_VALUE = 6;

    /**
     * TRX_COMMITTED = 7
     */
    const TRX_COMMITTED_VALUE = 7;

    /**
     * TRX_ROLLEDBACK = 9
     */
    const TRX_ROLLEDBACK_VALUE = 9;

    /**
     * PRODUCED_MESSAGE = 10
     */
    const PRODUCED_MESSAGE_VALUE = 10;

    /**
     * CLIENT_ID_ASSIGNED = 11
     */
    const CLIENT_ID_ASSIGNED_VALUE = 11;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $CURRENT_SCHEMA = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $ACCOUNT_EXPIRED = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $GENERATED_INSERT_ID = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $ROWS_AFFECTED = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $ROWS_FOUND = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $ROWS_MATCHED = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $TRX_COMMITTED = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $TRX_ROLLEDBACK = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $PRODUCED_MESSAGE = null;

    /**
     * @var \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    protected static $CLIENT_ID_ASSIGNED = null;

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function CURRENT_SCHEMA()
    {
        if (self::$CURRENT_SCHEMA !== null) {
            return self::$CURRENT_SCHEMA;
        }

        return self::$CURRENT_SCHEMA = new self('CURRENT_SCHEMA', self::CURRENT_SCHEMA_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function ACCOUNT_EXPIRED()
    {
        if (self::$ACCOUNT_EXPIRED !== null) {
            return self::$ACCOUNT_EXPIRED;
        }

        return self::$ACCOUNT_EXPIRED = new self('ACCOUNT_EXPIRED', self::ACCOUNT_EXPIRED_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function GENERATED_INSERT_ID()
    {
        if (self::$GENERATED_INSERT_ID !== null) {
            return self::$GENERATED_INSERT_ID;
        }

        return self::$GENERATED_INSERT_ID = new self('GENERATED_INSERT_ID', self::GENERATED_INSERT_ID_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function ROWS_AFFECTED()
    {
        if (self::$ROWS_AFFECTED !== null) {
            return self::$ROWS_AFFECTED;
        }

        return self::$ROWS_AFFECTED = new self('ROWS_AFFECTED', self::ROWS_AFFECTED_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function ROWS_FOUND()
    {
        if (self::$ROWS_FOUND !== null) {
            return self::$ROWS_FOUND;
        }

        return self::$ROWS_FOUND = new self('ROWS_FOUND', self::ROWS_FOUND_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function ROWS_MATCHED()
    {
        if (self::$ROWS_MATCHED !== null) {
            return self::$ROWS_MATCHED;
        }

        return self::$ROWS_MATCHED = new self('ROWS_MATCHED', self::ROWS_MATCHED_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function TRX_COMMITTED()
    {
        if (self::$TRX_COMMITTED !== null) {
            return self::$TRX_COMMITTED;
        }

        return self::$TRX_COMMITTED = new self('TRX_COMMITTED', self::TRX_COMMITTED_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function TRX_ROLLEDBACK()
    {
        if (self::$TRX_ROLLEDBACK !== null) {
            return self::$TRX_ROLLEDBACK;
        }

        return self::$TRX_ROLLEDBACK = new self('TRX_ROLLEDBACK', self::TRX_ROLLEDBACK_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function PRODUCED_MESSAGE()
    {
        if (self::$PRODUCED_MESSAGE !== null) {
            return self::$PRODUCED_MESSAGE;
        }

        return self::$PRODUCED_MESSAGE = new self('PRODUCED_MESSAGE', self::PRODUCED_MESSAGE_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function CLIENT_ID_ASSIGNED()
    {
        if (self::$CLIENT_ID_ASSIGNED !== null) {
            return self::$CLIENT_ID_ASSIGNED;
        }

        return self::$CLIENT_ID_ASSIGNED = new self('CLIENT_ID_ASSIGNED', self::CLIENT_ID_ASSIGNED_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Notice\SessionStateChanged\Parameter
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::CURRENT_SCHEMA();
            case 2:
                return self::ACCOUNT_EXPIRED();
            case 3:
                return self::GENERATED_INSERT_ID();
            case 4:
                return self::ROWS_AFFECTED();
            case 5:
                return self::ROWS_FOUND();
            case 6:
                return self::ROWS_MATCHED();
            case 7:
                return self::TRX_COMMITTED();
            case 9:
                return self::TRX_ROLLEDBACK();
            case 10:
                return self::PRODUCED_MESSAGE();
            case 11:
                return self::CLIENT_ID_ASSIGNED();
            default:
                return null;
        }
    }
}
