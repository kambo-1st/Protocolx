<?php
namespace Kambo\Database\Protocolx\Result;

use Kambo\Database\Protocolx\Result\RowResult;

/**
 * Represents a result from a SQL statement.
 *
 * @package Kambo\Database\Protocolx\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class SqlResult extends RowResult
{
    private $affectedRows;
    private $lastInsertId;

    public function __construct(
        $rows,
        $columns,
        $affectedRows = 0,
        $lastInsertId = null,
        $warnings = []
    ) {
        parent::__construct($rows, $columns, $warnings);

        $this->affectedRows = $affectedRows;
        $this->lastInsertId = $lastInsertId;
    }

    /**
     * Returns the number of affected items for the last operation.
     *
     * @return int The number of affected items.
     */
    public function getAffectedRowsCount()
    {
        return $this->affectedRows;
    }

    /**
     * Returns ID of the last row inserted into a collection.
     *
     * @return int The id of last inserted document.
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }

    /**
     * Check if the result has data. This indicates that the result was produced
     * from a data-returning query.
     *
     * @return boolean true if the reuslt has data
     */
    public function hasData()
    {
        if (count($this->rows) > 0) {
            return true;
        }

        return false;
    }
}
