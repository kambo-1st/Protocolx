<?php
namespace Kambo\Database\Protocolx\Client\Operations;

/**
 * Base class for all operations on ProtocolX api.
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class BaseOperation
{
    /**
     * ProtocolX transport client.
     *
     * @var \Kambo\Database\Protocolx\Client\Client
     */
    private $client;

    /**
     * Create new BaseOperation
     *
     * @param \Kambo\Database\Protocolx\Client\Client $client ProtocolX transport client.
     */
    public function __construct(
        $client
    ) {
        $this->client = $client;
    }

    public function sendRequest($requestType, $requestObject)
    {
        return $this->client->sendRequest($requestType, $requestObject);
    }
}
