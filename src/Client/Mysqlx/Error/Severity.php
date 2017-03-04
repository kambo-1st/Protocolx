<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Error;

/**
 * Protobuf message : Mysqlx.Error.Severity
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Error
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Severity extends \Protobuf\Enum
{

    /**
     * ERROR = 0
     */
    const ERROR_VALUE = 0;

    /**
     * FATAL = 1
     */
    const FATAL_VALUE = 1;

    /**
     * @var \Mysqlx\Error\Severity
     */
    protected static $ERROR = null;

    /**
     * @var \Mysqlx\Error\Severity
     */
    protected static $FATAL = null;

    /**
     * @return \Mysqlx\Error\Severity
     */
    public static function ERROR()
    {
        if (self::$ERROR !== null) {
            return self::$ERROR;
        }

        return self::$ERROR = new self('ERROR', self::ERROR_VALUE);
    }

    /**
     * @return \Mysqlx\Error\Severity
     */
    public static function FATAL()
    {
        if (self::$FATAL !== null) {
            return self::$FATAL;
        }

        return self::$FATAL = new self('FATAL', self::FATAL_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Error\Severity
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 0:
                return self::ERROR();
            case 1:
                return self::FATAL();
            default:
                return null;
        }
    }
}
