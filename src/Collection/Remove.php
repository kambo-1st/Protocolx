<?php

namespace Kambo\Database\Protocolx\Collection;

/**
 * An operation for removing documents in a collection.
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Remove
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
     *                                    language. For example ['_id' => '1003'] will select only documents
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
     * Sets the maximum number of documents to be deleted.
     *
     * @param int $count The maximum number of documents.
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
        return $this->protocolAdapter->crudRemove(
            $this->schemaName,
            $this->collectionName,
            $this->query,
            $this->limit
        );
    }
}
