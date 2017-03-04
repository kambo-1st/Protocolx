<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\CrudTrait;
use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

use Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder;

use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;

use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Projection;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Find as FindOperation;

/**
 * Find operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Find extends BaseOperation
{
    use CrudTrait;

    public function execute(
        $schema,
        $collectionName,
        $query = null,
        $projection = null,
        $limit = null,
        $order = null
    ) {
        $crudFind = $this->getCrudOperation(
            FindOperation::class,
            $schema,
            $collectionName
        );
        // TODO [SIMEK, i]- implement missing order
        $this->decorateByCriteria($crudFind, $query);
        $this->decorateByLimit($crudFind, $limit);

        if (is_array($projection)) {
            $this->decorateByProjection($crudFind, $projection);
        }

        $parsedMessages = $this->sendRequest(
            ClientMessage::CRUD_FIND_VALUE,
            $crudFind
        );

        $transform = new Transformer();

        return $transform->constructResultData($parsedMessages, true);
    }

    private function decorateByProjection($crudFind, $projection)
    {
        foreach ($projection as $field) {
            $typeBuilder = new TypeBuilder();
            $value       = $typeBuilder->getColumnPathValue($field);

            $projectionValue = new Projection();
            $projectionValue->setSource($value);
            // TODO [SIMEK, i] add support for the user definition of alias
            //Alias must be always set
            $projectionValue->setAlias($field);

            $crudFind->addProjection($projectionValue);
        }

        return $crudFind;
    }
}
