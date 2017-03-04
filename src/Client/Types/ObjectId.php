<?php
namespace Kambo\Database\Protocolx\Client\Types;

/**
 * Generate object id from provided timestamp
 *
 * @package Kambo\Database\Protocolx\Types
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class ObjectId
{
    /**
     * Generate unique object id based on timestamp
     *
     * @return string Unique id eg. 507c7f79bcf86cd7994f6c0e
     */
    public function generateObjectId()
    {
        return $this->generateIdFromTimestamp(time());
    }

    /**
     * Generate object id from provided timestamp
     *
     * @param int $timestamp
     *
     * @return string
     *
     * @see http://docs.mongodb.org/manual/reference/object-id/
     */
    private function generateIdFromTimestamp($timestamp)
    {
        static $idCounter;

        if ($idCounter === null) {
            $idCounter = rand();
        }

        // unsigned long
        $binaryTimestamp = pack('N', $timestamp);
        // 3 bit machine identifier
        $machineId = substr(md5(gethostname()), 0, 3);
        // unsigned short
        $binaryPID = pack('n', getmypid());

        // Counter
        $counter  = substr(pack('N', $idCounter++), 1, 3);
        $binaryId = "{$binaryTimestamp}{$machineId}{$binaryPID}{$counter}";

        // Convert to ASCII
        $id = '';
        for ($i = 0; $i < 12; $i++) {
            $id .= sprintf("%02X", ord($binaryId[$i]));
        }

        return $id;
    }
}
