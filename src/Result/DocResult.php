<?php
namespace Kambo\Database\Protocolx\Result;

use Kambo\Database\Protocolx\Result\BaseResult;

/**
 * Represents a result from a find operation.
 *
 * @package Kambo\Database\Protocolx\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class DocResult extends BaseResult
{
    private $documents;

    /**
     * Base result
     *
     * @param array $documents Found documents
     * @param array $warnings  Warnings generate by server.
     */
    public function __construct($documents, $warnings = [])
    {
        parent::__construct($warnings);

        $this->documents = $documents;
    }

    /**
     * Fetch the next element from the result set.
     *
     * @return array found document
     */
    public function fetchOne()
    {
        foreach ($this->documents as $document) {
            yield $document;
        }
    }

    /**
     * Get all elements in the result.
     *
     * @return array All found documents
     */
    public function fetchAll()
    {
        return $this->documents;
    }
}
