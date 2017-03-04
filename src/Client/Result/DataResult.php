<?php

namespace Kambo\Database\Protocolx\Client\Result;

/**
 * Data result from the operation
 *
 * @package Kambo\Database\Protocolx\Client\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class DataResult
{
    private $columns;
    private $rows;
    private $metadata;

    public function __construct(
        $columns,
        $rows,
        $metadata
    ) {
        $this->columns  = $columns;
        $this->rows     = $rows;
        $this->metadata = $metadata;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }
}
