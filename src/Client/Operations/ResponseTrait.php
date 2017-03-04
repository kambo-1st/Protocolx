<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Exception\MysqlxException;
use Kambo\Database\Protocolx\Exception\DriverException;

use Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages\Type;

/**
 * ResponseTrait
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
trait ResponseTrait
{
    public function getResponseObjectByType($type, $parsedMessages)
    {
        foreach ($parsedMessages as $parsedMessage) {
            if ($parsedMessage['type'] === $type) {
                return $parsedMessage['data'];
            }

            if (Type::ERROR_VALUE === $parsedMessage['type']) {
                throw new MysqlxException(
                    $parsedMessage['data']->getMsg(),
                    $parsedMessage['data']->getCode()
                );
            }
        }

        throw new DriverException(
            'Server does not send any data.',
            2
        );
    }
}
