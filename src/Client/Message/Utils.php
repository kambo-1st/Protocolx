<?php

namespace Kambo\Database\Protocolx\Client\Message;

/**
 * Encoding utils methods
 *
 * @package Kambo\Database\Protocolx\Client\Message
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Utils
{
    public function uInt32($i, $endianness = false)
    {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("N", $i);
        } elseif ($endianness === false) {  // little-endian
            $i = $f("V", $i);
        } elseif ($endianness === null) {  // machine byte order
            $i = $f("L", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public function uInt8($i)
    {
        return is_int($i) ? pack("C", $i) : unpack("C", $i)[1];
    }
}
