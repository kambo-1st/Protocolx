<?php
namespace Kambo\Database\Protocolx\Client\Operations;

// Client\Operations
use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

// Client\Mysqlx
use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecute;

use Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder;

/**
 * Statement operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Statement extends BaseOperation
{
    public function execute(
        $statement,
        $namespace = 'sql',
        $arguments = [],
        $compactMetadata = false
    ) {
        $stmtExecute = new StmtExecute();
        $stmtExecute->setStmt($statement);
        $stmtExecute->setNamespace($namespace);
        $stmtExecute->setCompactMetadata($compactMetadata);

        if (!empty($arguments)) {
            $typeBuilder = new TypeBuilder();
            foreach ($arguments as $argument) {
                $stmtExecute->addArgs($typeBuilder->getScalarString($argument));
            }
        }

        $parsedMessages = $this->sendRequest(
            ClientMessage::SQL_STMT_EXECUTE_VALUE,
            $stmtExecute
        );

        $transform = new Transformer();

        return $transform->constructResultData($parsedMessages);
    }
}
