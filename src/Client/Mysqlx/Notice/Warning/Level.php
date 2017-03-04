<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice\Warning;

/**
 * Protobuf enum : Mysqlx.Notice.Warning.Level
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Level extends \Protobuf\Enum
{

    /**
     * NOTE = 1
     */
    const NOTE_VALUE = 1;

    /**
     * WARNING = 2
     */
    const WARNING_VALUE = 2;

    /**
     * ERROR = 3
     */
    const ERROR_VALUE = 3;

    /**
     * @var \Mysqlx\Notice\Warning\Level
     */
    protected static $NOTE = null;

    /**
     * @var \Mysqlx\Notice\Warning\Level
     */
    protected static $WARNING = null;

    /**
     * @var \Mysqlx\Notice\Warning\Level
     */
    protected static $ERROR = null;

    /**
     * @return \Mysqlx\Notice\Warning\Level
     */
    public static function NOTE()
    {
        if (self::$NOTE !== null) {
            return self::$NOTE;
        }

        return self::$NOTE = new self('NOTE', self::NOTE_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\Warning\Level
     */
    public static function WARNING()
    {
        if (self::$WARNING !== null) {
            return self::$WARNING;
        }

        return self::$WARNING = new self('WARNING', self::WARNING_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\Warning\Level
     */
    public static function ERROR()
    {
        if (self::$ERROR !== null) {
            return self::$ERROR;
        }

        return self::$ERROR = new self('ERROR', self::ERROR_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Notice\Warning\Level
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::NOTE();
            case 2:
                return self::WARNING();
            case 3:
                return self::ERROR();
            default:
                return null;
        }
    }
}
