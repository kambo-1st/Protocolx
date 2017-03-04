<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any;

/**
 * Protobuf enum : Mysqlx.Datatypes.Any.Type
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Type extends \Protobuf\Enum
{

    /**
     * SCALAR = 1
     */
    const SCALAR_VALUE = 1;

    /**
     * OBJECT = 2
     */
    const OBJECT_VALUE = 2;

    /**
     * ARRAY = 3
     */
    const ARRAY_VALUE = 3;

    /**
     * @var \Mysqlx\Datatypes\Any\Type
     */
    protected static $SCALAR = null;

    /**
     * @var \Mysqlx\Datatypes\Any\Type
     */
    protected static $OBJECT = null;

    /**
     * @var \Mysqlx\Datatypes\Any\Type
     */
    protected static $ARRAY = null;

    /**
     * @return \Mysqlx\Datatypes\Any\Type
     */
    public static function SCALAR()
    {
        if (self::$SCALAR !== null) {
            return self::$SCALAR;
        }

        return self::$SCALAR = new self('SCALAR', self::SCALAR_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Any\Type
     */
    public static function OBJECT()
    {
        if (self::$OBJECT !== null) {
            return self::$OBJECT;
        }

        return self::$OBJECT = new self('OBJECT', self::OBJECT_VALUE);
    }

    /**
     * @return \Mysqlx\Datatypes\Any\Type
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
     * @return \Mysqlx\Datatypes\Any\Type
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::SCALAR();
            case 2:
                return self::OBJECT();
            case 3:
                return self::ARRAYOBJECT();
            default:
                return null;
        }
    }
}
