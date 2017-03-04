<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\CrudTrait;
use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

use Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder;

use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;

use Kambo\Database\Protocolx\Client\Mysqlx\Crud\UpdateOperation;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\UpdateOperation\UpdateType;

/**
 * Update operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Update extends BaseOperation
{
    use CrudTrait;

    private $operationMap = [
        'itemSet' => 'ITEM_SET',
        'itemUnset' => 'ITEM_REMOVE',
        'arrayInsert' => 'ARRAY_INSERT',
        'arrayAppend' => 'ARRAY_APPEND',
        'arrayDelete' => 'ITEM_REMOVE',
    ];

    public function execute(
        $schema,
        $collectionName,
        $query,
        $operations,
        $limit = null
    ) {
    
        $crudUpdate = $this->getCrudOperation(
            \Kambo\Database\Protocolx\Client\Mysqlx\Crud\Update::class,
            $schema,
            $collectionName
        );

        $this->decorateByCriteria($crudUpdate, $query);
        $this->decorateByLimit($crudUpdate, $limit);

        if (is_array($operations)) {
            $this->decorateByOperation($crudUpdate, $operations);
        }

        $parsedMessages = $this->sendRequest(
            ClientMessage::CRUD_UPDATE_VALUE,
            $crudUpdate
        );

        $transform  = new Transformer();
        $resultData = $transform->constructResultData($parsedMessages);

        return $resultData->getMetadata();
    }

    private function decorateByOperation($crudUpdate, $operations)
    {
        foreach ($operations as $operation) {
            $updateOperation = new UpdateOperation();

            list($operation, $field, $value) = $operation;

            $typeBuilder      = new TypeBuilder();
            $columnIdentifier = $typeBuilder->getColumnIdentifier($field);

            if (is_array($value)) {
                $expr = $typeBuilder->getArray($value);
            } else {
                $expr = $typeBuilder->getLiteralStringValue($value);
            }

            if ($value !== null) {
                $updateOperation->setValue($expr);
            }

            $updateOperation->setSource($columnIdentifier);
            $updateOperation->setOperation(
                UpdateType::{$this->operationMap[$operation]}()
            );

            $crudUpdate->addOperation($updateOperation);
        }

        return $crudUpdate;
    }
}
