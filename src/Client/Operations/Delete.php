<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\CrudTrait;
use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as MessageType;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Delete as DeleteOperation;

/**
 * Delete operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Delete extends BaseOperation
{
    use CrudTrait;

    public function execute($schema, $collectionName, $query, $limit = null)
    {
        $crudDelete = $this->getCrudOperation(
            DeleteOperation::class,
            $schema,
            $collectionName
        );

        // Decorate CRUD action by query and limit
        $this->decorateByCriteria($crudDelete, $query);
        $this->decorateByLimit($crudDelete, $limit);

        $parsedMessages = $this->sendRequest(
            MessageType::CRUD_DELETE_VALUE,
            $crudDelete
        );

        $transform  = new Transformer();
        $resultData = $transform->constructResultData($parsedMessages);

        return $resultData->getMetadata();
    }
}
