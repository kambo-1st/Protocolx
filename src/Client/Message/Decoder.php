<?php

namespace Kambo\Database\Protocolx\Client\Message;

use Kambo\Database\Protocolx\Client\Message\Utils;

/**
 * Message decoder
 *
 * @package Kambo\Database\Protocolx\Client\Message
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Decoder
{
    public function decode($incomingData)
    {
        $messages = [];

        $firstMessage  = $this->getMessageFromPossition($incomingData);
        $messages[]    = $firstMessage;
        $messageLength = $firstMessage['length'];
        $nextPossition =  5 + ($messageLength-1);
        // There are more messages in the buffer
        if (($messageLength + 4) < strlen($incomingData)) {
            while ($nextPossition !== false) {
                $message = $this->getMessageFromPossition($incomingData, $nextPossition);
                $messages[] = $message;
                $nextPossition +=  5 + ($message['length']-1);
                if ($nextPossition >= strlen($incomingData)) {
                    $nextPossition = false;
                }
            }
        }

        return $messages;
    }

    private function getMessageFromPossition($data, $fromPossition = 0)
    {
        $utils = new Utils();
        
        $messageLength = $utils->uInt32(substr($data, $fromPossition, 4));
        $messageType   = $utils->uInt8($data[$fromPossition+4]);
        $messageData   = substr($data, $fromPossition + 5, $messageLength-1);

        if ($messageData === false) {
            $messageData = '';
        }

        return [
            'length' => $messageLength,
            'type' => $messageType,
            'data' => $messageData
        ];
    }
}
