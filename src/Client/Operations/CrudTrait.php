<?php
namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\QueryBuilder\QueryBuilder;

use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Limit;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\DataModel;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Collection;

/**
 * CrudTrait
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
trait CrudTrait
{
    public function getCrudOperation($operation, $schemaName, $collectionName)
    {
        $collection = new Collection();
        $collection->setSchema($schemaName);
        $collection->setName($collectionName);

        $crudFind = new $operation();
        $crudFind->setCollection($collection);
        $crudFind->setDataModel(DataModel::DOCUMENT());

        return $crudFind;
    }

    public function decorateByLimit($crudAction, $limit)
    {
        if (is_array($limit)) {
            $limitObject = new Limit();
            $limitObject->setRowCount($limit['count']);
            if (isset($limit['offset'])) {
                $limitObject->setOffset($limit['offset']);
            }

            $crudAction->setLimit($limitObject);
        }

        return $crudAction;
    }

    public function decorateByCriteria($crudAction, $criteria)
    {
        if (is_array($criteria)) {
            $queryBuilder = new QueryBuilder();
            $crudAction->setCriteria(
                $queryBuilder->getInQueryLanguage($criteria)
            );
        }

        return $crudAction;
    }
}
