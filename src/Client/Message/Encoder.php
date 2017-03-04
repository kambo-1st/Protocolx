<?php

namespace Kambo\Database\Protocolx\Client\Message;

use Kambo\Database\Protocolx\Client\Message\Utils;

/**
 * Message encoder
 *
 * @package Kambo\Database\Protocolx\Client\Message
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Encoder
{
    public function encode($messageType, $payload)
    {
        $utils = new Utils();
        
        $payload->seek(0);
        $size          = $utils->uInt32(($payload->getSize()) + 1);
        $messageType   = $utils->uInt8($messageType); //4;
        $payLoadBinary = $payload->read($payload->getSize());

        return $size.$messageType.$payLoadBinary;
    }
}
