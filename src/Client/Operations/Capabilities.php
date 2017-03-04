<?php
namespace Kambo\Database\Protocolx\Client\Operations;

// Client\Operations
use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\ResponseTrait;
// Client\Mysqlx
use Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages\Type as ServerMessage;
use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;
use Kambo\Database\Protocolx\Client\Mysqlx\Connection\CapabilitiesGet;
// Client\Types
use Kambo\Database\Protocolx\Client\Types\Marshalling;

/**
 * Capabilities operation on ProtocolX
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Capabilities extends BaseOperation
{
    use ResponseTrait;

    public function get()
    {
        $parsedMessages = $this->sendRequest(
            ClientMessage::CON_CAPABILITIES_GET_VALUE,
            new CapabilitiesGet()
        );

        $capabilities = $this->getResponseObjectByType(
            ServerMessage::CONN_CAPABILITIES_VALUE,
            $parsedMessages
        );

        $marshalling = new Marshalling();

        $capabilitiesList = [];
        foreach ($capabilities->getCapabilitiesList() as $capability) {
            $capabilityName = $capability->getName();
            $capabilityVal  = $capability->getValue();

            $capabilitiesList[$capabilityName] = $marshalling->marshallFrom(
                $capabilityVal
            );
        }

        return $capabilitiesList;
    }
}
