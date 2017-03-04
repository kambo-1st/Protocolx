<?php

namespace Kambo\Database\Protocolx\Collection;

/**
 * An operation for modifing documents in a collection.
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Modify
{
    /**
     * Protocol adapter for handling connection to the server.
     *
     * @var \Kambo\Database\Protocolx\Adapter\Protocolx
     */
    private $protocolAdapter;

    /**
     * Name of the collection in the database.
     *
     * @var string
     */
    private $collectionName;

    /**
     * Name of the schema in the database.
     *
     * @var string
     */
    private $schemaName;

    /**
     * The fields for which to search. Expresion must be in MongoDB's query language.
     *
     * @var array|null
     */
    private $query = null;

    /**
     * List of operations which will be executed on the collection.
     *
     * @var array
     */
    private $operations = [];

    /**
     * Maximum number of documents to be returned.
     *
     * @var array|null
     */
    private $limit;

    /**
     * Creates new add operation on provided schema and collection.
     *
     * @param Protocolx  $protocolAdapter Protocol adapter for handling connection to the server.
     * @param string     $schemaName      Name of the schema (database).
     * @param string     $collectionName  Name of the collection.
     * @param array|null $query           The fields for which to search. Expresion must be in MongoDB's query
     *                                    language. For example ['_id' => '1003'] will select ondly documents
     *                                    with _id 1003
     */
    public function __construct(
        $protocolAdapter,
        $schemaName,
        $collectionName,
        $query = null
    ) {
        $this->protocolAdapter = $protocolAdapter;
        $this->schemaName      = $schemaName;
        $this->collectionName  = $collectionName;

        $this->query = $query;
    }

    /**
     * Sets or updates attributes on documents in a collection.
     *
     * @param string $docPath The document path of the item to be set.
     * @param mixed  $value   The value to be set on the specified attribute.
     *
     * @return self for fluent interface
     */
    public function setItem($docPath, $value)
    {
        $this->operations[] = ['itemSet', $docPath, $value];

        return $this;
    }

    /**
     * Removes attributes from documents in a collection.
     *
     * @param string $docPath The document path of the item to be set.
     *
     * @return self for fluent interface
     */
    public function unsetItem($docPath)
    {
        $this->operations[] = ['itemUnset', $docPath, null];

        return $this;
    }

    /**
     * Insert a value into the specified array in documents of a collection.
     *
     * @param string $docPath The document path of the item to be set.
     * @param mixed  $value   The value to be set on the specified attribute.
     *
     * @return self for fluent interface
     */
    public function arrayInsert($docPath, $value)
    {
        throw new \Exception('Not implemented');
        $this->operations[] = ['arrayInsert', $docPath, $value];

        return $this;
    }

    /**
     * Inserts a value into a specific position in an array attribute in documents of a collection.
     *
     * @param string $docPath The document path of the item to be set.
     * @param mixed  $value   The value to be inserted.
     *
     * @return self for fluent interface
     */
    public function arrayAppend($docPath, $value)
    {
        $this->operations[] = ['arrayAppend', $docPath, $value];

        return $this;
    }

    /**
     * Sets or updates attributes on documents in a collection.
     *
     * @param string $docPath  The document path of the item to be set.
     * @param mixed  $position The position of item in the array.
     *
     * @return self for fluent interface
     */
    public function arrayDelete($docPath, $position)
    {
        throw new \Exception('Not implemented');
        $this->operations[] = ['arrayDelete', $docPath, $position];

        return $this;
    }

    /**
     * Sets the maximum number of documents, which will be affected by modify
     * operation.
     *
     * @param int $count The maximum number of documents, which will be affected by modify
     *                   operation.
     *
     * @return self for fluent interface
     */
    public function limit($count)
    {
        $this->limit = [
            'count' => $count
        ];

        return $this;
    }

    /**
     * Execute the operation and return the result.
     *
     * @return \Kambo\Database\Protocolx\Result\Result Operation result
     */
    public function execute()
    {
        return $this->protocolAdapter->crudModify(
            $this->schemaName,
            $this->collectionName,
            $this->query,
            $this->operations,
            $this->limit
        );
    }
}
