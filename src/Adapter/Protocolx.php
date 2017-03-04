<?php
namespace Kambo\Database\Protocolx\Adapter;

use Kambo\Database\Protocolx\Client\Client;

// Result
use Kambo\Database\Protocolx\Result\SqlResult;
use Kambo\Database\Protocolx\Result\DocResult;
use Kambo\Database\Protocolx\Result\RowResult;
use Kambo\Database\Protocolx\Result\Result;

// Client\Operations
use Kambo\Database\Protocolx\Client\Operations\Insert;
use Kambo\Database\Protocolx\Client\Operations\Update;
use Kambo\Database\Protocolx\Client\Operations\Delete;
use Kambo\Database\Protocolx\Client\Operations\Find;
use Kambo\Database\Protocolx\Client\Operations\Statement;
use Kambo\Database\Protocolx\Client\Operations\Capabilities;

use Kambo\Database\Protocolx\Exception\DriverException;

/**
 * Adapter represents a connection between PHP and the MySQL through ProtocolX.
 * Separates high level abstraction of DevX from concrete database protocol.
 *
 * @package Kambo\Database\Protocolx\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Protocolx
{
    /**
     * ProtocolX transport client.
     *
     * @var \Kambo\Database\Protocolx\Client\Client
     */
    private $client;

    /**
     * Create new protocol adapter.
     *
     * @param Client|null $client ProtocolX transport client for handling connection to the server.
     */
    public function __construct($client = null)
    {
        if (isset($client)) {
            $this->client = $client;
        } else {
            $this->client = new Client();
        }
    }

    public function query($query)
    {
        $statement    = new Statement($this->client);
        $resultObject = $statement->execute($query);
        $metaData     = $resultObject->getMetadata();

        $sqlResult = new SqlResult(
            $resultObject->getRows(),
            $resultObject->getColumns(),
            $metaData->getAffectedRowsCount(),
            $metaData->getAutoIncrementValue(),
            $metaData->getWarnings()
        );

        return $sqlResult;
    }

    public function queryDocument($query, $args = [])
    {
        $statement    = new Statement($this->client);
        $resultObject = $statement->execute($query, 'xplugin', $args);

        $metaData  = $resultObject->getMetadata();
        $rowResult = new RowResult(
            $resultObject->getRows(),
            $resultObject->getColumns(),
            $metaData->getWarnings()
        );

        return $rowResult;
    }

    public function crudInsert(
        $schemaName,
        $collection,
        $model,
        $rows,
        $projection
    ) {
   
        $insertOperation = $this->getOperation(Insert::class);
        $operationResult = $insertOperation->execute(
            $schemaName,
            $collection,
            $model,
            $rows,
            $projection
        );

        return new Result(
            $operationResult->getWarnings(),
            $operationResult->getAffectedRowsCount(),
            $operationResult->getAutoIncrementValue(),
            $operationResult->getLastDocumentId()
        );
    }

    public function crudFind(
        $schemaName,
        $collectionName,
        $expresion = null,
        $fields = null,
        $limit = null
    ) {
    
        $findOperation = $this->getOperation(Find::class);
        $resultObject  = $findOperation->execute(
            $schemaName,
            $collectionName,
            $expresion,
            $fields,
            $limit
        );

        $resultedRows = $resultObject->getRows();

        $result = [];
        if (isset($resultedRows)) {
            foreach ($resultedRows as $smtRow) {
                foreach ($smtRow as $fieldPoss => $field) {
                    $result[] = $field;
                }
            }
        }

        $metaData = $resultObject->getMetadata();

        return new DocResult($result, $metaData->getWarnings());
    }

    public function crudModify(
        $schemaName,
        $name,
        $query,
        $operations,
        $limit = null
    ) {
    
        $insertOperation = $this->getOperation(Update::class);
        $operationResult = $insertOperation->execute(
            $schemaName,
            $name,
            $query,
            $operations,
            $limit
        );

        return new Result(
            $operationResult->getWarnings(),
            $operationResult->getAffectedRowsCount(),
            $operationResult->getAutoIncrementValue(),
            $operationResult->getLastDocumentId()
        );
    }

    public function crudRemove($schemaName, $name, $query, $limit)
    {
        $deleteOperation = $this->getOperation(Delete::class);
        $operationResult = $deleteOperation->execute(
            $schemaName,
            $name,
            $query,
            $limit
        );

        return new Result(
            $operationResult->getWarnings(),
            $operationResult->getAffectedRowsCount(),
            $operationResult->getAutoIncrementValue(),
            $operationResult->getLastDocumentId()
        );
    }

    public function connect($parameters)
    {
        $this->client->connect($parameters['host'], $parameters['port']);

        // Get server capabilities and check if the provided auth mechanism
        // is enabled on the server.
        $capabilities = $this->getOperation(Capabilities::class);
        $this->checkSupportedAuthMech(
            $parameters['authMethod'],
            $capabilities->get()
        );

        $authentication = $this->getAuthentication($parameters['authMethod']);
        $authentication->authentificate(
            $parameters['dbUser'],
            $parameters['dbPassword']
        );
    }

    public function close()
    {
        $this->client->close();
    }

    // ------------ PRIVATE METHODS

    /**
     * Check if server support provided authentication mechanisms
     *
     * @param string $mechanisms   Authentication mechanisms provided by user eg.: MYSQL41
     * @param Array  $capabilities Array with server capabilities
     *
     * return void
     */
    private function checkSupportedAuthMech($mechanisms, array $capabilities)
    {
        if (
            !in_array(
                $mechanisms,
                $capabilities['authentication.mechanisms']
            )
        ) {
            throw new DriverException(
                'Server does not support authentication mechanisms: '
                .$mechanisms,
                3
            );
        }
    }

    private function getOperation($operationName)
    {
        return new $operationName($this->client);
    }

    private function getAuthentication($methodName)
    {
        $classPath  = "Kambo\\Database\\Protocolx\\Client\\Authentication\\";
        $classPath .= ucfirst(strtolower($methodName));

        return new $classPath($this->client);
    }
}
