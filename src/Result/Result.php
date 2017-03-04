<?php
namespace Kambo\Database\Protocolx\Result;

use Kambo\Database\Protocolx\Result\BaseResult;

/**
 * Represents a result from a non query operations performed on the database.
 *
 * @package Kambo\Database\Protocolx\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Result extends BaseResult
{
    private $affectedItems;
    private $lastInsertId;
    private $insertedDocumentsIds;

    public function __construct(
        $warnings,
        $affectedItems,
        $lastInsertId = null,
        $insertedDocumentsIds = []
    ) {
        parent::__construct($warnings);

        $this->affectedItems = $affectedItems;
        $this->lastInsertId  = $lastInsertId;

        $this->insertedDocumentsIds = $insertedDocumentsIds;
    }

    /**
     * Returns the number of affected items for the last operation.
     *
     * @return int The number of affected items.
     */
    public function getAffectedItemsCount()
    {
        return $this->affectedItems;
    }

    /**
     * Returns ID of the last document inserted into a collection.
     *
     * @return int The number of warnings.
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }

    /**
     * Returns ID of the last document inserted into a collection.
     *
     * @return string The document id.
     */
    public function getDocumentId()
    {
        return reset($this->insertedDocumentsIds);
    }

    /**
     * Returns the list of generated documents IDs.
     *
     * @return array List of the inserted ids.
     */
    public function getDocumentIds()
    {
        return $this->insertedDocumentsIds;
    }

    /**
     * Returns ID of the last document inserted into a collection.
     *
     * @return string The document id.
     */
    public function getLastDocumentId()
    {
        return end($this->insertedDocumentsIds);
    }
}
