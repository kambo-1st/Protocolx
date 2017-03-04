<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages;

/**
 * Protobuf message : Mysqlx.ServerMessages.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
// @codingStandardsIgnoreStart
class Type extends \Protobuf\Enum
{

    /**
     * OK = 0
     */
    const OK_VALUE = 0;

    /**
     * ERROR = 1
     */
    const ERROR_VALUE = 1;

    /**
     * CONN_CAPABILITIES = 2
     */
    const CONN_CAPABILITIES_VALUE = 2;

    /**
     * SESS_AUTHENTICATE_CONTINUE = 3
     */
    const SESS_AUTHENTICATE_CONTINUE_VALUE = 3;

    /**
     * SESS_AUTHENTICATE_OK = 4
     */
    const SESS_AUTHENTICATE_OK_VALUE = 4;

    /**
     * NOTICE = 11
     */
    const NOTICE_VALUE = 11;

    /**
     * RESULTSET_COLUMN_META_DATA = 12
     */
    const RESULTSET_COLUMN_META_DATA_VALUE = 12;

    /**
     * RESULTSET_ROW = 13
     */
    const RESULTSET_ROW_VALUE = 13;

    /**
     * RESULTSET_FETCH_DONE = 14
     */
    const RESULTSET_FETCH_DONE_VALUE = 14;

    /**
     * RESULTSET_FETCH_SUSPENDED = 15
     */
    const RESULTSET_FETCH_SUSPENDED_VALUE = 15;

    /**
     * RESULTSET_FETCH_DONE_MORE_RESULTSETS = 16
     */
    const RESULTSET_FETCH_DONE_MORE_RESULTSETS_VALUE = 16;

    /**
     * SQL_STMT_EXECUTE_OK = 17
     */
    const SQL_STMT_EXECUTE_OK_VALUE = 17;

    /**
     * RESULTSET_FETCH_DONE_MORE_OUT_PARAMS = 18
     */
    const RESULTSET_FETCH_DONE_MORE_OUT_PARAMS_VALUE = 18;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $OK = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $ERROR = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $CONN_CAPABILITIES = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $SESS_AUTHENTICATE_CONTINUE = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $SESS_AUTHENTICATE_OK = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $NOTICE = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_COLUMN_META_DATA = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_ROW = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_FETCH_DONE = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_FETCH_SUSPENDED = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_FETCH_DONE_MORE_RESULTSETS = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $SQL_STMT_EXECUTE_OK = null;

    /**
     * @var \Mysqlx\ServerMessages\Type
     */
    protected static $RESULTSET_FETCH_DONE_MORE_OUT_PARAMS = null;

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function OK()
    {
        if (self::$OK !== null) {
            return self::$OK;
        }

        return self::$OK = new self('OK', self::OK_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function ERROR()
    {
        if (self::$ERROR !== null) {
            return self::$ERROR;
        }

        return self::$ERROR = new self('ERROR', self::ERROR_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function CONN_CAPABILITIES()
    {
        if (self::$CONN_CAPABILITIES !== null) {
            return self::$CONN_CAPABILITIES;
        }

        return self::$CONN_CAPABILITIES = new self('CONN_CAPABILITIES', self::CONN_CAPABILITIES_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function SESS_AUTHENTICATE_CONTINUE()
    {
        if (self::$SESS_AUTHENTICATE_CONTINUE !== null) {
            return self::$SESS_AUTHENTICATE_CONTINUE;
        }

        return self::$SESS_AUTHENTICATE_CONTINUE = new self('SESS_AUTHENTICATE_CONTINUE', self::SESS_AUTHENTICATE_CONTINUE_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function SESS_AUTHENTICATE_OK()
    {
        if (self::$SESS_AUTHENTICATE_OK !== null) {
            return self::$SESS_AUTHENTICATE_OK;
        }

        return self::$SESS_AUTHENTICATE_OK = new self('SESS_AUTHENTICATE_OK', self::SESS_AUTHENTICATE_OK_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function NOTICE()
    {
        if (self::$NOTICE !== null) {
            return self::$NOTICE;
        }

        return self::$NOTICE = new self('NOTICE', self::NOTICE_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_COLUMN_META_DATA()
    {
        if (self::$RESULTSET_COLUMN_META_DATA !== null) {
            return self::$RESULTSET_COLUMN_META_DATA;
        }

        return self::$RESULTSET_COLUMN_META_DATA = new self('RESULTSET_COLUMN_META_DATA', self::RESULTSET_COLUMN_META_DATA_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_ROW()
    {
        if (self::$RESULTSET_ROW !== null) {
            return self::$RESULTSET_ROW;
        }

        return self::$RESULTSET_ROW = new self('RESULTSET_ROW', self::RESULTSET_ROW_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_FETCH_DONE()
    {
        if (self::$RESULTSET_FETCH_DONE !== null) {
            return self::$RESULTSET_FETCH_DONE;
        }

        return self::$RESULTSET_FETCH_DONE = new self('RESULTSET_FETCH_DONE', self::RESULTSET_FETCH_DONE_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_FETCH_SUSPENDED()
    {
        if (self::$RESULTSET_FETCH_SUSPENDED !== null) {
            return self::$RESULTSET_FETCH_SUSPENDED;
        }

        return self::$RESULTSET_FETCH_SUSPENDED = new self('RESULTSET_FETCH_SUSPENDED', self::RESULTSET_FETCH_SUSPENDED_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_FETCH_DONE_MORE_RESULTSETS()
    {
        if (self::$RESULTSET_FETCH_DONE_MORE_RESULTSETS !== null) {
            return self::$RESULTSET_FETCH_DONE_MORE_RESULTSETS;
        }

        return self::$RESULTSET_FETCH_DONE_MORE_RESULTSETS = new self('RESULTSET_FETCH_DONE_MORE_RESULTSETS', self::RESULTSET_FETCH_DONE_MORE_RESULTSETS_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function SQL_STMT_EXECUTE_OK()
    {
        if (self::$SQL_STMT_EXECUTE_OK !== null) {
            return self::$SQL_STMT_EXECUTE_OK;
        }

        return self::$SQL_STMT_EXECUTE_OK = new self('SQL_STMT_EXECUTE_OK', self::SQL_STMT_EXECUTE_OK_VALUE);
    }

    /**
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function RESULTSET_FETCH_DONE_MORE_OUT_PARAMS()
    {
        if (self::$RESULTSET_FETCH_DONE_MORE_OUT_PARAMS !== null) {
            return self::$RESULTSET_FETCH_DONE_MORE_OUT_PARAMS;
        }

        return self::$RESULTSET_FETCH_DONE_MORE_OUT_PARAMS = new self('RESULTSET_FETCH_DONE_MORE_OUT_PARAMS', self::RESULTSET_FETCH_DONE_MORE_OUT_PARAMS_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\ServerMessages\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 0:
                return self::OK();
            case 1:
                return self::ERROR();
            case 2:
                return self::CONN_CAPABILITIES();
            case 3:
                return self::SESS_AUTHENTICATE_CONTINUE();
            case 4:
                return self::SESS_AUTHENTICATE_OK();
            case 11:
                return self::NOTICE();
            case 12:
                return self::RESULTSET_COLUMN_META_DATA();
            case 13:
                return self::RESULTSET_ROW();
            case 14:
                return self::RESULTSET_FETCH_DONE();
            case 15:
                return self::RESULTSET_FETCH_SUSPENDED();
            case 16:
                return self::RESULTSET_FETCH_DONE_MORE_RESULTSETS();
            case 17:
                return self::SQL_STMT_EXECUTE_OK();
            case 18:
                return self::RESULTSET_FETCH_DONE_MORE_OUT_PARAMS();
            default:
                return null;
        }
    }
}
// @codingStandardsIgnoreEnd
