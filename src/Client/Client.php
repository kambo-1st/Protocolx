<?php
namespace Kambo\Database\Protocolx\Client;

// Mysqlx\Session
use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateContinue;
use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateOk;
use Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities;
use Kambo\Database\Protocolx\Client\Mysqlx\Error;
use Kambo\Database\Protocolx\Client\Mysqlx\Ok;
use Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;

// Mysqlx\ServerMessages
use Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages\Type;

// Mysqlx\Resultset
use Kambo\Database\Protocolx\Client\Mysqlx\Resultset\ColumnMetaData;
use Kambo\Database\Protocolx\Client\Mysqlx\Resultset\FetchDone;
use Kambo\Database\Protocolx\Client\Mysqlx\Resultset\Row;

// Client
use Kambo\Database\Protocolx\Client\Message\Encoder;
use Kambo\Database\Protocolx\Client\Message\Decoder;
use Kambo\Database\Protocolx\Client\Socket;

/**
 * Mysqlx client
 *
 * @package Kambo\Database\Protocolx\Client
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Client
{
    private $typeObjectMap = [
        Type::OK_VALUE => Ok::class,
        Type::ERROR_VALUE => Error::class,
        Type::CONN_CAPABILITIES_VALUE => Capabilities::class,

        Type::SESS_AUTHENTICATE_CONTINUE_VALUE => AuthenticateContinue::class,
        Type::SESS_AUTHENTICATE_OK_VALUE => AuthenticateOk::class,

        Type::NOTICE_VALUE => Frame::class,

        // Result set
        Type::RESULTSET_COLUMN_META_DATA_VALUE => ColumnMetaData::class,
        Type::RESULTSET_ROW_VALUE => Row::class,
        Type::RESULTSET_FETCH_DONE_VALUE => FetchDone::class,

        Type::SQL_STMT_EXECUTE_OK_VALUE => StmtExecuteOk::class,
    ];

    /**
     * Socket library wrapper
     *
     * @var \Kambo\Database\Protocolx\Client\Socket
     */
    private $client;
    private $messageEncoder;
    private $messageDecoder;

    /**
     * Create new Client
     */
    public function __construct()
    {
        $this->client = new Socket(); // should by passed from the adapter

        $this->messageEncoder = new Encoder();
        $this->messageDecoder = new Decoder();
    }

    public function connect($host, $port)
    {
        return $this->client->connect(gethostbyname($host), $port);
    }

    public function close()
    {
        $this->client->close();
    }

    public function sendRequest($requestType, $requestObject)
    {
        $stream  = $requestObject->toStream();
        $rawData = $this->sendMessage(
            $this->messageEncoder->encode(
                $requestType,
                $stream
            )
        );

        $messages = $this->messageDecoder->decode($rawData);

        return $this->parseMessages($messages);
    }

    // ------------ PRIVATE METHODS

    private function sendMessage($message)
    {
        $this->client->write($message);
        $data = $this->client->read();

        return $data;
    }

    private function parseMessages($messages)
    {
        $output = [];
        foreach ($messages as $message) {
            $output[] = $this->parseMessage($message);
        }

        return $output;
    }

    private function parseMessage($message)
    {
        $messageObject = null;
        $messageType   = $message['type'];
        if (isset($this->typeObjectMap[$messageType])) {
            $className     = $this->typeObjectMap[$messageType];
            $messageObject = new $className($message['data']);
        }

        return [
            'type' => $messageType,
            'data' => $messageObject,
        ];
    }
}
