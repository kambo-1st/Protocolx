<?php
namespace Kambo\Database\Protocolx\Collection;

/**
 * An operation for finding documents in a collection.
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Find
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
     * Name of fields for which will be extracted.
     *
     * @var array|null
     */
    private $fields = null;

    /**
     * Maximum number of documents to be returned.
     *
     * @var array|null
     */
    private $limit = null;

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

        $this->schemaName     = $schemaName;
        $this->collectionName = $collectionName;

        $this->query = $query;
    }

    /**
     * Sets the maximum number of documents to be returned.
     *
     * @param int $count  The maximum number of documents.
     * @param int $offset The document offset for this query.
     *
     * @return self for fluent interface
     */
    public function limit($count, $offset = null)
    {
        $this->limit = [
            'count' => $count
        ];

        if (isset($offset)) {
            $this->limit['offset'] = $offset;
        }

        return $this;
    }

    /**
     * Sets the sorting criteria.
     *
     * @param string $field     Field for the sorting.
     * @param string $direction Sorting direction.
     *
     * @return self for fluent interface
     */
    public function sort($field, $direction = 'ASC')
    {
        return $this->setSort($field, $direction);
    }

    /**
     * Sets the sorting criteria, this is just alias for sort method.
     *
     * @param string $field     Field for the sorting.
     * @param string $direction Sorting direction.
     *
     * @return self for fluent interface
     */
    public function orderBy($field, $direction = 'ASC')
    {
        return $this->setSort($field, $direction);
    }

    /**
     * Sets a document field filter.
     *
     * @param array $fields Name of fields for which will be extracted.
     *
     * @return self for fluent interface
     */
    public function fields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Execute the operation and return the result.
     *
     * @return \Kambo\Database\Protocolx\Result\DocResult Operation result
     */
    public function execute()
    {
        return $this->protocolAdapter->crudFind(
            $this->schemaName,
            $this->collectionName,
            $this->query,
            $this->fields,
            $this->limit
        );
    }

    // ------------ PRIVATE METHODS

    /**
     * Sets the sorting criteria.
     *
     * @param string $field     Field for the sorting.
     * @param string $direction Sorting direction.
     *
     * @return self for fluent interface
     */
    private function setSort($field, $direction)
    {
        throw new \Exception('Not implemented');

        $this->field     = $field;
        $this->direction = $direction;

        return $this;
    }
}
