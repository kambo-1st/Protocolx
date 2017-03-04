<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame;

/**
 * Protobuf message : Mysqlx.Notice.Frame.Scope
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Scope extends \Protobuf\Enum
{

    /**
     * GLOBAL = 1
     */
    const GLOBAL_VALUE = 1;

    /**
     * LOCAL = 2
     */
    const LOCAL_VALUE = 2;

    /**
     * @var \Mysqlx\Notice\Frame\Scope
     */
    protected static $GLOBAL = null;

    /**
     * @var \Mysqlx\Notice\Frame\Scope
     */
    protected static $LOCAL = null;

    /**
     * @return \Mysqlx\Notice\Frame\Scope
     */
    public static function GLOBALSCOPE()
    {
        if (self::$GLOBAL !== null) {
            return self::$GLOBAL;
        }

        return self::$GLOBAL = new self('GLOBAL', self::GLOBAL_VALUE);
    }

    /**
     * @return \Mysqlx\Notice\Frame\Scope
     */
    public static function LOCAL()
    {
        if (self::$LOCAL !== null) {
            return self::$LOCAL;
        }

        return self::$LOCAL = new self('LOCAL', self::LOCAL_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Notice\Frame\Scope
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::GLOBALSCOPE();
            case 2:
                return self::LOCAL();
            default:
                return null;
        }
    }
}
