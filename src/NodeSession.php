<?php
namespace Kambo\Database\Protocolx;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Schema;

/**
 * A NodeSession serves as an abstraction for a physical connection to exactly one MySQL server running the X Plugin.
 *
 * @package Kambo\Database\Protocolx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class NodeSession
{
    /**
     * Protocol adapter for handling connection to the server.
     *
     * @var Protocolx
     */
    private $adapter;

    /**
     * Create new NodeSession with provided protocol adapter.
     *
     * @param Protocolx $protocolAdapter Protocol adapter
     */
    public function __construct(
        Protocolx $protocolAdapter
    ) {
        $this->adapter = $protocolAdapter;
    }

    /**
     * Close connection to the server.
     *
     * @return void
     */
    public function close()
    {
        $this->adapter->close();
    }

    /**
     * Creates a schema (database) with the given name on the MySQL server host.
     *
     * @param string $schemaName Schema name
     *
     * @return Schema Instance of Schema object representing newly created database
     */
    public function createSchema($schemaName)
    {
        $this->adapter->query("CREATE DATABASE ".$schemaName ."");

        return new Schema($this->adapter, $schemaName);
    }

    /**
     * Drop existing schema - drops all tables in the database and deletes the database.
     *
     * @param string $schemaName Schema name
     *
     * @return void
     */
    public function dropSchema($schemaName)
    {
        $this->adapter->query("DROP DATABASE ".$schemaName ."");
    }

    /**
     * Get instance of Schema object for a specific database schema (database).
     *
     * Schema will be always returned, even if the schema doesn't exist. Use existsInDatabase on the returned
     * object to checking if the schema realy exists.
     *
     * @param String $schemaName Connection parameters
     *
     * @return Schema Instance of Schema object will be always returned, even if the schema doesn't exist.
     */
    public function getSchema($schemaName)
    {
        return new Schema($this->adapter, $schemaName);
    }

    /**
     * Lists the schemas on the MySQL server host.
     *
     * @return Schema[] Array with all schemas on the MySQL server host.
     */
    public function getSchemas()
    {
        $schemas = [];
        $result  = $this->adapter->query("SHOW DATABASES");

        foreach ($result->fetchAll() as $row) {
            $schemas[] = new Schema($this->adapter, $row);
        }

        return $schemas;
    }

    /**
     * Drop collection from the schema
     *
     * @param string $schemaName Name of schema
     * @param string $tableName  Name of collection
     *
     * @todo Implement this method
     * @return void
     */
    public function dropCollection($schemaName, $collectionName)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Drop table from the schema
     *
     * @param string $schemaName Name of schema
     * @param string $tableName  Name of table
     *
     * @todo Implement this method
     * @return void
     */
    public function dropTable($schemaName, $tableName)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Executes an SQL statement, returning a result set as a array.
     *
     * @param string $query The SQL statement to prepare and execute. Data inside the query should be properly escaped.
     *
     * @return Array Each item
     */
    public function sql($query)
    {
        return $this->adapter->query($query);
    }
}
