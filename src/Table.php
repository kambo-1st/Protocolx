<?php
namespace Kambo\Database\Protocolx;

// Adapter
use Kambo\Database\Protocolx\Adapter\Protocolx;

/**
 * Represents table in schema
 *
 * @todo Implement this class
 *
 * @package Kambo\Database\Protocolx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Table
{
    /**
     * Protocol adapter for handling connection to the server.
     *
     * @var Protocolx
     */
    private $protocolAdapter;

    /**
     * Name of the collection in the database.
     *
     * @var string
     */
    private $name;

    /**
     * Instance of the schema in the database.
     *
     * @var \Kambo\Database\Protocolx\Schema
     */
    private $schema;

    /**
     * Create instance of Table with provided protocol adapter. Constructor
     * does not check existence of collection in the database. Use method
     * existsInDatabase to check existence of collection in the database.
     *
     * @param Protocolx $protocolAdapter Protocol adapter for handling connection to the server.
     * @param string    $tableName       Name of the table.
     * @param string    $schema          Instance of the schema in the database.
     */
    public function __construct(
        Protocolx $protocolAdapter,
        $tableName,
        $schema
    ) {
        $this->protocolAdapter = $protocolAdapter;

        $this->name   = $tableName;
        $this->schema = $schema;
    }

    /**
     * Get name of the table.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
