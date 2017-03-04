<?php
namespace Kambo\Database\Protocolx\Collection;

/**
 * An operation for adding documents to a collection.
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Add
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
     * Documents which will be inserted into collection.
     *
     * @var array
     */
    private $documents;

    /**
     * Creates new add operation on provided schema and collection.
     *
     * @param Protocolx $protocolAdapter Protocol adapter for handling connection to the server.
     * @param string    $schemaName      Name of the schema (database).
     * @param string    $collectionName  Name of the collection.
     * @param array     $documents       Documents which will be inserted into collection.
     */
    public function __construct(
        $protocolAdapter,
        $schemaName,
        $collectionName,
        array $documents = []
    ) {
        $this->protocolAdapter = $protocolAdapter;

        $this->schemaName     = $schemaName;
        $this->collectionName = $collectionName;

        $this->documents = $documents;
    }

    /**
     * Add documents into operation
     *
     * @param array $documents Documents which will be inserted into collection.
     *
     * @return self for fluent interface
     */
    public function add(array $documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Execute the operation and return the result.
     *
     * @return \Kambo\Database\Protocolx\Result\Result Operation result
     */
    public function execute()
    {
        return $this->protocolAdapter->crudInsert(
            $this->schemaName,
            $this->collectionName,
            null,
            $this->documents,
            null
        );
    }
}
