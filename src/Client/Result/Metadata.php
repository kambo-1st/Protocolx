<?php
namespace Kambo\Database\Protocolx\Client\Result;

/**
 * Metadata result from the operation
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Metadata
{
    private $state;

    /**
     * Create metadata result from the operation.
     *
     * @param array $state sql operation state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getMessage()
    {
        return $this->state['PRODUCED_MESSAGE'];
    }
    
    public function getWarningsCount()
    {
        return count($this->state['WARNINGS']);
    }

    public function getWarnings()
    {
        return isset($this->state['WARNINGS'])
                    ? $this->state['WARNINGS']
                    : [];
    }

    public function getAffectedRowsCount()
    {
        return isset($this->state['ROWS_AFFECTED'])
                    ? $this->state['ROWS_AFFECTED']
                    : null;
    }

    public function getAffectedItemsCount()
    {
        return $this->state['ROWS_AFFECTED'];
    }

    public function getAutoIncrementValue()
    {
        return isset($this->state['GENERATED_INSERT_ID'])
                    ? $this->state['GENERATED_INSERT_ID']
                    : null;
    }

    public function getDocumentId()
    {
        return reset($this->state['DOC_IDS']);
    }

    public function getDocumentIds()
    {
        return $this->state['DOC_IDS'];
    }

    private $insertedDocumentsIds = [];

    public function setInsertedDocumentsIds($documentId)
    {
        $this->insertedDocumentsIds = $documentId;

        return $this;
    }

    public function getLastDocumentId()
    {
        return end($this->insertedDocumentsIds);
    }
}
