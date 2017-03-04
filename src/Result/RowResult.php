<?php
namespace Kambo\Database\Protocolx\Result;

use Kambo\Database\Protocolx\Result\BaseResult;

/**
 * Represents a result from a Table.select operation.
 *
 * @package Kambo\Database\Protocolx\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class RowResult extends BaseResult
{
    protected $rows = [];
    protected $columns;

    public function __construct(
        $rows,
        $columns,
        $warnings = []
    ) {
        parent::__construct($warnings);

        $this->rows    = $rows;
        $this->columns = $columns;
    }

    /**
     * Fetch the next element from the result set.
     *
     * @return array found document
     */
    public function fetchOne()
    {
        foreach ($this->rows as $rows) {
            yield $rows;
        }
    }

    /**
     * Get all elements in the result.
     *
     * @return array All found documents
     */
    public function fetchAll($transform = false)
    {
        if ($transform) {
            return $this->transformData();
        }

        return $this->rows;
    }

    /**
     * Returns the number of columns.
     *
     * @return int The number of columns.
     */
    public function getColumnCount()
    {
        return count($this->columns);
    }

    /**
     * Returns the metadata about columns.
     *
     * @return array The metadata about columns.
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Returns the names of the columns.
     *
     * @return array The names of all columns in result set.
     */
    public function getColumnNames()
    {
        $columnsNames = [];
        foreach ($this->columns as $oneColumn) {
            $columnsNames[] = $oneColumn['name'];
        }

        return $columnsNames;
    }

    // ------------ PRIVATE METHODS

    /**
     * Transform data to associative array
     *
     * @return array All found documents
     */
    private function transformData()
    {
        $result = [];
        foreach ($this->rows as $smtRow) {
            $row = [];
            foreach ($smtRow as $fieldPoss => $field) {
                $key = $this->columns[$fieldPoss]['name'];
                $row[$key] = $field;
            }

            $result[] = $row;
        }

        return $result;
    }
}
