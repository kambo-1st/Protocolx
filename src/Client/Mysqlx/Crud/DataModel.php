<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf enum : Mysqlx.Crud.DataModel
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class DataModel extends \Protobuf\Enum
{

    /**
     * DOCUMENT = 1
     */
    const DOCUMENT_VALUE = 1;

    /**
     * TABLE = 2
     */
    const TABLE_VALUE = 2;

    /**
     * @var \Mysqlx\Crud\DataModel
     */
    protected static $DOCUMENT = null;

    /**
     * @var \Mysqlx\Crud\DataModel
     */
    protected static $TABLE = null;

    /**
     * @return \Mysqlx\Crud\DataModel
     */
    public static function DOCUMENT()
    {
        if (self::$DOCUMENT !== null) {
            return self::$DOCUMENT;
        }

        return self::$DOCUMENT = new self('DOCUMENT', self::DOCUMENT_VALUE);
    }

    /**
     * @return \Mysqlx\Crud\DataModel
     */
    public static function TABLE()
    {
        if (self::$TABLE !== null) {
            return self::$TABLE;
        }

        return self::$TABLE = new self('TABLE', self::TABLE_VALUE);
    }

    /**
     * @param int $value
     * @return \Mysqlx\Crud\DataModel
     */
    public static function valueOf($value)
    {
        switch ($value) {
            case 1:
                return self::DOCUMENT();
            case 2:
                return self::TABLE();
            default:
                return null;
        }
    }
}
