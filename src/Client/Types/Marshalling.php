<?php
namespace Kambo\Database\Protocolx\Client\Types;

use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type;
use Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type as ScalarType;

/**
 * Data types marshalling from protolx to PHP
 *
 * @package Kambo\Database\Protocolx\Types
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Marshalling
{
    public function marshallFrom($value)
    {
        return $this->marshall($value);
    }

    private function marshall($value)
    {
        if ($value->hasType()) {
            $marshaledValue = null;
            if (Type::SCALAR_VALUE === $value->getType()->value()) {
                $marshaledValue = $this->marshalScalarValue($value);
            }

            if (Type::ARRAY_VALUE === $value->getType()->value()) {
                $marshaledValue = $this->marshalArrayValue($value);
            }

            return $marshaledValue;
        }
    }

    private function marshalArrayValue($value)
    {
        $arrayValue = $value->getArray();

        $items = $arrayValue->getValueList();
        $marshaledValue = [];
        foreach ($items as $item) {
            $marshaledValue[] = $this->marshall($item);
        }

        return $marshaledValue;
    }

    private function marshalScalarValue($value)
    {
        $scalarValue    = $value->getScalar();
        $marshaledValue = null;
        if (ScalarType::V_BOOL_VALUE === $scalarValue->getType()->value()) {
            $marshaledValue = $scalarValue->getVBool();
        }

        if (ScalarType::V_STRING_VALUE === $scalarValue->getType()->value()) {
            $marshaledValue = (string)$scalarValue->getVString()->getValue();
        }

        return $marshaledValue;
    }
}
