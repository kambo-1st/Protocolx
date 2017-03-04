<?php
namespace Kambo\Database\Protocolx;

// spl
use InvalidArgumentException;

// Adapter
use Kambo\Database\Protocolx\Adapter\Protocolx;

// Collection
use Kambo\Database\Protocolx\Collection;

/**
 * A representation of a database schema and provides access to the schema contents.
 * Schema object acts as a main entry point for working with collections and tables.
 *
 * This does not create schema on the server or guarantees that the schema exists
 * in the server. If you want to check existence of the schema in the database
 * call method existsInDatabase.
 *
 * @package Kambo\Database\Protocolx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Schema
{
    /**
     * Protocol adapter for handling connection to the server.
     *
     * @var Protocolx
     */
    private $protocolAdapter;

    /**
     * Name of the schema on the server.
     *
     * @var string
     */
    private $name;

    /**
     * Create instance of Schema with provided protocol adapter. Constructor does
     * not check existence of Schema on the server. Use method existsInDatabase
     * to check existence of Schema on the server.
     *
     * @param Protocolx $protocolAdapter Protocol adapter for handling connection to the server.
     * @param string    $schemaName      Name of the schema.
     */
    public function __construct(
        Protocolx $protocolAdapter,
        $schemaName
    ) {
        $this->protocolAdapter = $protocolAdapter;
        $this->name            = $schemaName;
    }

    /**
     * Get name of the schema.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Check if collection exists on the server.
     *
     * @return boolean
     */
    public function existsInDatabase()
    {
        $schemaExists = false;

        $result = $this->protocolAdapter->query(
            "SHOW DATABASES LIKE '".$this->name."'"
        )->fetchAll();

        if (!empty($result) && is_array($result)) {
            foreach ($result as $row) {
                foreach ($row as $field) {
                    if ($this->name === $field) {
                        $schemaExists = true;
                    }
                }
            }
        }

        return $schemaExists;
    }

    /**
     * Gets all collections in the schema (database).
     *
     * @return \Kambo\Database\Protocolx\Collection[]
     */
    public function getCollections()
    {
        return $this->listObjects('COLLECTION');
    }

    /**
     * Get an existing collection stored in the database. Method by defualt does
     * not check if the collection exists. This can be forced by using option
     * validateExistence.
     *
     * @param string $collectionName Name of the collection
     * @param array  $options        Additional non mandatory options:
     *
     *                               validateExistence - check if the collection exists in the schema
     *
     * @return \Kambo\Database\Protocolx\Collection
     *
     * @throws InvalidArgumentException If the collection does not exists and validateExistence
     *                                  option is set to true
     */
    public function getCollection($collectionName, array $options = [])
    {
        $collection = new Collection(
            $this->protocolAdapter,
            $collectionName,
            $this
        );

        if (isset($options['validateExistence'])
                && $options['validateExistence'] === true) {
            if ($collection->existsInDatabase() !== true) {
                throw new InvalidArgumentException(
                    'Collection does not exists in the schema'
                );
            }
        }

        return $collection;
    }

    /**
     * Create new collection in current schema.
     *
     * @param string $collectionName Name of the collection
     * @param array  $options        Additional non mandatory options:
     *
     *                               reuseExistingObject - reuse existing collection
     *
     * @return \Kambo\Database\Protocolx\Collection
     */
    public function createCollection($collectionName, array $options = [])
    {
        $this->protocolAdapter->queryDocument(
            'create_collection',
            [
                $this->getName(),
                $collectionName
            ]
        );

        return $this->getCollection($collectionName);
    }

    /**
     * Drop collection from the schema. This is proxy method for getting
     * collection and calling drop method.
     *
     * @param string $collectionName Name of the collection
     *
     * @return void
     */
    public function dropCollection($collectionName)
    {
        $this->getCollection($collectionName)->drop();
    }

    /**
     * Returns a list of tables in the schema.
     *
     * @return \Kambo\Database\Protocolx\Table[]
     */
    public function getTables()
    {
        return $this->listObjects('TABLE');
    }

    /**
     * Get an existing table stored in the database. Method by defualt does
     * not check if the table exists. This can be forced by using option
     * validateExistence.
     *
     * @param string $tableName Name of the collection
     * @param array  $options   Additional non mandatory options:
     *
     *                          validateExistence - check if the table exists in the schema
     *
     * @return \Kambo\Database\Protocolx\Table
     *
     * @throws InvalidArgumentException If the table does not exists and validateExistence
     *                                  option is set to true
     */
    public function getTable($tableName, array $options = [])
    {
        return new Table($this->protocolAdapter, $tableName, $this);
    }

    /**
     * Drop table from the schema
     *
     * @param string $tableName Name of the table
     *
     * @return void
     */
    public function dropTable($tableName)
    {
        return $this->getTable($tableName)->drop();
    }

    // ------------ PRIVATE METHODS

    /**
     * List all objects of selected type from schema.
     *
     * @param string $type Type of the object can be TABLE or COLLECTION
     *
     * @return \Kambo\Database\Protocolx\Table|\Kambo\Database\Protocolx\Collection
     */
    private function listObjects($type)
    {
        $foundObjects = [];

        $this->protocolAdapter->query("USE ".$this->name);
        $objects = $this->protocolAdapter->queryDocument('list_objects');

        foreach ($objects->fetchAll(true) as $object) {
            if ($object['type'] == $type) {
                $foundObjects[] = $this->createObject($object['name'], $type);
            }
        }

        return $foundObjects;
    }

    /**
     * List all objects of selected type from schema.
     *
     * @param string $name Name of the table or collection.
     * @param string $type Type of the object can be TABLE or COLLECTION
     *
     * @return \Kambo\Database\Protocolx\Table|\Kambo\Database\Protocolx\Collection
     */
    private function createObject($name, $type)
    {
        $objectType = Collection::class;
        if ($type === 'TABLE') {
            $objectType = Table::class;
        }

        return new $objectType(
            $this->protocolAdapter,
            $name,
            $this
        );
    }
}
