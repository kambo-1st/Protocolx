<?php
namespace Kambo\Database\Protocolx;

// Schema
use Kambo\Database\Protocolx\Schema;

// Adapter
use Kambo\Database\Protocolx\Adapter\Protocolx;

// Collection
use Kambo\Database\Protocolx\Collection\Add;
use Kambo\Database\Protocolx\Collection\Find;
use Kambo\Database\Protocolx\Collection\Modify;
use Kambo\Database\Protocolx\Collection\Remove;

/**
 * Collection represents documents of the same type grouped together and stored
 * in the database. Collection objects acts as a main entry point for storing
 * and retrieving documents.
 *
 * This does not create collection in the database or guarantees that the collection
 * exists in the database. If you want to check existence of the collection in
 * the database call method existsInDatabase.
 *
 * Class is mainly implemented as a factory for creating instances of objects
 * representing individual CRUD operation. None of these operations are not
 * automatically performed. They have to be executed by calling execute() method
 * on returned operation object.
 *
 * Following operations on collection are supported: find, add, modify and remove.
 * these CRUD operation.
 *
 * @package Kambo\Database\Protocolx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Collection
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
     * @var Schema
     */
    private $schema;

    /**
     * Create instance of Collection with provided protocol adapter. Constructor
     * does not check existence of collection in the database. Use method
     * existsInDatabase to check existence of collection in the database.
     *
     * @param Protocolx $protocolAdapter Protocol adapter for handling connection to the server.
     * @param string    $collectionName  Name of the collection.
     * @param Schema    $schema          Name of the schema (database).
     */
    public function __construct(
        Protocolx $protocolAdapter,
        $collectionName,
        Schema $schema
    ) {
        $this->protocolAdapter = $protocolAdapter;

        $this->name   = $collectionName;
        $this->schema = $schema;
    }

    /**
     * Get name of the collection.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Check if collection exists in the database.
     *
     * @return boolean
     */
    public function existsInDatabase()
    {
        $objects = $this->protocolAdapter->queryDocument(
            'list_objects',
            [
                $this->schema->getName(),
                $this->getName()
            ]
        );

        return count($objects->fetchAll()) === 1 ? true : false;
    }

    /**
     * Create instance of Find operation with given search expresion.
     *
     * @param array $expresion The fields for which to search. Expresion must be in MongoDB's query language.
     *                         For example ['_id' => '1003'] will select ondly documents with _id 1003
     *
     * @return Find
     */
    public function find($expresion = null)
    {
        return new Find(
            $this->protocolAdapter,
            $this->schema->getName(),
            $this->getName(),
            $expresion
        );
    }

    /**
     * Create instance of Add operation with provided document.
     *
     * @param array $document
     *
     * @return Add
     */
    public function add(array $document)
    {
        return new Add(
            $this->protocolAdapter,
            $this->schema->getName(),
            $this->getName(),
            $document
        );
    }

    /**
     * Create instance of Modify operation for documents matching provided
     * search expresion.
     *
     * @param array $expresion The fields for which to search. Expresion must be in MongoDB's query language.
     *                         For example ['_id' => '1003'] will select ondly documents with _id 1003
     *
     * @return Modify
     */
    public function modify($expresion = null)
    {
        return new Modify(
            $this->protocolAdapter,
            $this->schema->getName(),
            $this->getName(),
            $expresion
        );
    }

    /**
     * Create instance of Remove operation for documents matching provided
     * search expresion.
     *
     * @param array $expresion The fields for which to search. Expresion must be in MongoDB's query language.
     *                         For example ['_id' => '1003'] will select only documents with _id 1003
     *
     * @return Remove
     */
    public function remove($expresion = null)
    {
        return new Remove(
            $this->protocolAdapter,
            $this->schema->getName(),
            $this->getName(),
            $expresion
        );
    }

    /**
     * Drop collection from the schema (database).
     *
     * @return void
     */
    public function drop()
    {
        // todo this should work with the result object...
        $this->protocolAdapter->queryDocument(
            'drop_collection',
            [
                $this->schema->getName(),
                $this->getName()
            ]
        );
    }
}
