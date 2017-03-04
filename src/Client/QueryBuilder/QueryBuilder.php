<?php

namespace Kambo\Database\Protocolx\Client\QueryBuilder;

use Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder;

/**
 * Transform Mongo query into Protocolx query format.
 *
 * @package Kambo\Database\Protocolx\Client\QueryBuilder
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class QueryBuilder
{
    /**
     * Type builder
     *
     * @var Kambo\Database\Protocolx\Client\QueryBuilder\TypeBuilder
     */
    private $typeBuilder;

    private $comparisonOperators = [
        '$eq' => '==',
        '$gt' => '>',
        '$gte' => '>=',
        '$lt' => '<',
        '$lte' => '<=',
        '$ne' => '!=',
    ];

    private $logicalOperators= [
        '$or' => '||',
        '$and' => '&&',
        '$not' => '!',
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typeBuilder = new TypeBuilder();
    }

    public function getInQueryLanguage($expresion)
    {
        $pipeline = [];

        foreach (array_reverse($expresion) as $identifier => $exprPart) {
            if (is_array($exprPart)) {
                $nestedPipeline = $this->resolveNested($exprPart, $identifier);

                if (isset($this->logicalOperators[$identifier])) {
                    $pipeline[] = $this->agregatePipeline(
                        $nestedPipeline,
                        $this->logicalOperators[$identifier]
                    );
                } else {
                    $pipeline = $nestedPipeline;
                }
            } else {
                $pipeline[] = $this->resolveOperator(
                    '==',
                    $identifier,
                    $exprPart
                );
            }
        }

        return $this->agregatePipeline($pipeline);
    }

    private function resolveNested(array $exprPart, $identifier)
    {
        $temporaryPipeline = [];
        foreach ($exprPart as $subIdentifier => $subPart) {
            // resolve operator, use defualt in submethod
            if (isset($this->comparisonOperators[$subIdentifier])) {
                $temporaryPipeline[] = $this->resolveOperator(
                    $this->comparisonOperators[$subIdentifier],
                    $identifier,
                    $subPart
                );
            } elseif ('$in' === $subIdentifier) {
                $temporaryPipeline[] = $this->resolveInOperator(
                    $identifier,
                    $subPart
                );
            } else {
                $temporaryPipeline[] = $this->resolveOperator(
                    '==',
                    $subIdentifier,
                    $subPart
                );
            }
        }

        return $temporaryPipeline;
    }

    private function resolveIdentifier($identifier)
    {
        if ($identifier === '_id') {
            return $this->typeBuilder->getColumnValue($identifier);
        } else {
            return $this->typeBuilder->getColumnPathValue($identifier);
        }
    }

    private function resolveInOperator($identifier, $values)
    {
        $inCondition = [];
        foreach ($values as $value) {
            $inCondition[] = $this->resolveOperator('==', $identifier, $value);
        }

        return $this->agregatePipeline($inCondition, '||');
    }

    private function resolveOperator($operator, $leftSide, $rightSide)
    {
        $leftSideValue = $this->resolveIdentifier($leftSide);
        if (is_int($rightSide)) {
            $rightSideValue = $this->typeBuilder->getLiteralNumberValue(
                $rightSide
            );
        } else {
            $rightSideValue = $this->typeBuilder->getLiteralStringValue(
                $rightSide
            );
        }

        return $this->typeBuilder->getOperator(
            $operator,
            $leftSideValue,
            $rightSideValue
        );
    }

    private function agregatePipeline($pipeline, $operator = '&&')
    {
        $sizeOfPipeline = count($pipeline);
        if ($sizeOfPipeline > 1) {
            for ($i = 0; $i < $sizeOfPipeline; $i++) {
                $child1 = $pipeline[$i];
                if ($sizeOfPipeline-1 != $i) {
                    $child2 = $pipeline[$i+1];

                    $pipeline[$i+1] = $this->typeBuilder->getOperator(
                        $operator,
                        $child1,
                        $child2
                    );
                }
            }

            return end($pipeline);
        } elseif ($sizeOfPipeline === 1) {
            return reset($pipeline);
        }

        return null;
    }
}
