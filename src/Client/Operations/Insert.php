<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\Operations\CrudTrait;
use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

use Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder;
use Kambo\Database\Protocolx\Client\Types\ObjectId;

use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Insert\TypedRow;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Insert as InsertOperation;
use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;

/**
 * Insert operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Insert extends BaseOperation
{
    use CrudTrait;

    const ID = '_id';

    public function execute(
        $schema,
        $collectionName,
        $model,
        $rows,
        $projection
    ) {
    
        $crudInsert = $this->getCrudOperation(
            InsertOperation::class,
            $schema,
            $collectionName
        );

        $crudInsert->setProjectionList();

        $insertedIds = [];
        foreach ($rows as $row) {
            $row[self::ID] = (new ObjectId())->generateObjectId();
            $insertedIds[] = $row[self::ID];

            $typeBuilder = new TypeBuilder();
            $fieldData   = $typeBuilder->getLiteralStringValue(
                json_encode($row)
            );

            $rowData = new TypedRow();
            $rowData->addField($fieldData);

            $crudInsert->addRow($rowData);
        }

        $parsedMessages = $this->sendRequest(
            ClientMessage::CRUD_INSERT_VALUE,
            $crudInsert
        );

        $transform  = new Transformer();
        $resultData = $transform->constructResultData($parsedMessages);

        return $resultData->getMetadata()->setInsertedDocumentsIds($insertedIds);
    }
}
