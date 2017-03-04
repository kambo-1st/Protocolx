<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud\Order;

/**
 * Protobuf enum : Mysqlx.Crud.Order.Direction
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Direction extends \Protobuf\Enum
{

    /**
     * ASC = 1
     */
    const ASC_VALUE = 1;

    /**
     * DESC = 2
     */
    const DESC_VALUE = 2;

    /**
     * @var \Mysqlx\Crud\Order\Direction
     */
    protected static $ASC = null;

    /**
     * @var \Mysqlx\Crud\Order\Direction
     */
    protected static $DESC = null;

    /**
     * @return \Mysqlx\Crud\Order\Direction
     */
    public static function ASC()
    {
        if (self::$ASC !== null) {
            return self::$ASC;
        }

        return self::$ASC = new self('ASC', self::ASC_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\Order\Direction
     */
    public static function DESC()
    {
        if (self::$DESC !== null) {
            return self::$DESC;
        }

        return self::$DESC = new self('DESC', self::DESC_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Crud\Order\Direction
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::ASC();
            case 2:
                return self::DESC();
            default:
                return null;
        }
    }
}
