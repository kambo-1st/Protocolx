<?php
namespace Kambo\Database\Protocolx\Client\QueryBuilder;

use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar;
use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String;
use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any;
use Kambo\Database\Protocolx\Client\Mysqlx\Expr\ArrayObject;
use Kambo\Database\Protocolx\Client\Mysqlx\Expr\ColumnIdentifier;
use Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem;
use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type as DataType;
use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type as AnyType;

use Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr as Expression;
use Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr\Type as ExpressionType;

/**
 * TypeBuilder
 *
 * @package Kambo\Database\Protocolx\Client\QueryBuilder
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class TypeBuilder
{
    public function getLiteralStringValue($value)
    {
        $string = new String();
        $string->setValue($value);

        $scalar = new Scalar();
        $scalar->setVString($string);
        $scalar->setType(DataType::V_STRING());

        $expr = new Expression();
        $expr->setType(ExpressionType::LITERAL());
        $expr->setLiteral($scalar);

        return $expr;
    }

    public function getScalarString($value)
    {
        $string = new String();
        $string->setValue($value);

        $scalar = new Scalar();
        $scalar->setVString($string);
        $scalar->setType(DataType::V_STRING());

        $args = new Any();
        $args->setScalar($scalar);
        $args->setType(AnyType::SCALAR());

        return $args;
    }

    public function getArray($value)
    {
        $array = ArrayObject::fromArray($value);

        $expr = new Expression();
        $expr->setType(ExpressionType::ARRAYOBJECT());
        $expr->setArray($array);

        return $expr;
    }

    public function getLiteralNumberValue($value)
    {
        $scalar = new Scalar();
        $scalar->setVUnsignedInt($value);
        $scalar->setType(DataType::V_UINT());

        $expr = new Expression();
        $expr->setType(ExpressionType::LITERAL());
        $expr->setLiteral($scalar);

        return $expr;
    }

    public function getColumnValue($value)
    {
        $columnIdentifier = new ColumnIdentifier();
        $columnIdentifier->setName($value);

        $expr = new Expression();
        $expr->setType(ExpressionType::IDENT());
        $expr->setIdentifier($columnIdentifier);

        return $expr;
    }

    public function getColumnPathValue($value)
    {
        $members = $this->parseDocumentPath($value);

        $columnIdentifier = new ColumnIdentifier();

        foreach ($members as $oneMember) {
            $columnIdentifier->addDocumentPath($oneMember);
        }

        $expr = new Expression();
        $expr->setType(ExpressionType::IDENT());
        $expr->setIdentifier($columnIdentifier);

        return $expr;
    }

    private function parseDocumentPath($documentPath)
    {
        $documentMembers = [];
        $parsedPath      = explode('.', $documentPath);
        foreach ($parsedPath as $documentMember) {
            $documentPathItem = new DocumentPathItem();
            $documentPathItem->setType(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem\Type::MEMBER());
            $documentPathItem->setValue($documentMember);
            $documentMembers[] = $documentPathItem;
        }

        return $documentMembers;
    }

    public function getColumnIdentifier($value)
    {
        $documentPathItem = new DocumentPathItem();
        $documentPathItem->setType(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem\Type::MEMBER());
        $documentPathItem->setValue($value);

        $columnIdentifier = new ColumnIdentifier();
        $columnIdentifier->addDocumentPath($documentPathItem);

        return $columnIdentifier;
    }

    public function getOperator($operation, $leftOperand, $rightOperand)
    {
        $operatorCom = new \Kambo\Database\Protocolx\Client\Mysqlx\Expr\Operator();
        $operatorCom->setName($operation);

        $operatorCom->addParam($leftOperand);
        $operatorCom->addParam($rightOperand);

        $combined = new \Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr();
        $combined->setType(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr\Type::OPERATOR());
        $combined->setOperator($operatorCom);

        return $combined;
    }
}
