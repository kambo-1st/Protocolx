<?php

namespace Kambo\Database\Protocolx\Result;

/**
 * The ancestor of all result objects
 *
 * @package Kambo\Database\Protocolx\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class BaseResult
{
    /**
     * List of warnings
     *
     * @var array
     */
    private $warnings;

    /**
     * Base result
     *
     * @param array $warnings Warnings generate by server.
     */
    public function __construct($warnings = [])
    {
        $this->warnings = $warnings;
    }

    /**
     * Returns the number of warnings.
     *
     * @return int The number of warnings.
     */
    public function getWarningsCount()
    {
        return count($this->warnings);
    }

    /**
     * Returns the warnings.
     *
     * @return array The array of warnings.
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}
