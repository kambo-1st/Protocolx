<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Expr;

/**
 * Protobuf message : Mysqlx.Expr.Expr
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Expr
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Expr extends \Protobuf\AbstractMessage
{

    /**
     * @var \Protobuf\UnknownFieldSet
     */
    protected $unknownFieldSet = null;

    /**
     * @var \Protobuf\Extension\ExtensionFieldMap
     */
    protected $extensions = null;

    /**
     * type required enum = 1
     *
     * @var \Mysqlx\Expr\Expr\Type
     */
    protected $type = null;

    /**
     * identifier optional message = 2
     *
     * @var \Mysqlx\Expr\ColumnIdentifier
     */
    protected $identifier = null;

    /**
     * variable optional string = 3
     *
     * @var string
     */
    protected $variable = null;

    /**
     * literal optional message = 4
     *
     * @var \Mysqlx\Datatypes\Scalar
     */
    protected $literal = null;

    /**
     * function_call optional message = 5
     *
     * @var \Mysqlx\Expr\FunctionCall
     */
    protected $function_call = null;

    /**
     * operator optional message = 6
     *
     * @var \Mysqlx\Expr\Operator
     */
    protected $operator = null;

    /**
     * position optional uint32 = 7
     *
     * @var int
     */
    protected $position = null;

    /**
     * object optional message = 8
     *
     * @var \Mysqlx\Expr\Object
     */
    protected $object = null;

    /**
     * array optional message = 9
     *
     * @var \Mysqlx\Expr\Array
     */
    protected $array = null;

    /**
     * Check if 'type' has a value
     *
     * @return bool
     */
    public function hasType()
    {
        return $this->type !== null;
    }

    /**
     * Get 'type' value
     *
     * @return \Mysqlx\Expr\Expr\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set 'type' value
     *
     * @param \Mysqlx\Expr\Expr\Type $value
     */
    public function setType(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr\Type $value)
    {
        $this->type = $value;
    }

    /**
     * Check if 'identifier' has a value
     *
     * @return bool
     */
    public function hasIdentifier()
    {
        return $this->identifier !== null;
    }

    /**
     * Get 'identifier' value
     *
     * @return \Mysqlx\Expr\ColumnIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set 'identifier' value
     *
     * @param \Mysqlx\Expr\ColumnIdentifier $value
     */
    public function setIdentifier(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\ColumnIdentifier $value = null)
    {
        $this->identifier = $value;
    }

    /**
     * Check if 'variable' has a value
     *
     * @return bool
     */
    public function hasVariable()
    {
        return $this->variable !== null;
    }

    /**
     * Get 'variable' value
     *
     * @return string
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * Set 'variable' value
     *
     * @param string $value
     */
    public function setVariable($value = null)
    {
        $this->variable = $value;
    }

    /**
     * Check if 'literal' has a value
     *
     * @return bool
     */
    public function hasLiteral()
    {
        return $this->literal !== null;
    }

    /**
     * Get 'literal' value
     *
     * @return \Mysqlx\Datatypes\Scalar
     */
    public function getLiteral()
    {
        return $this->literal;
    }

    /**
     * Set 'literal' value
     *
     * @param \Mysqlx\Datatypes\Scalar $value
     */
    public function setLiteral(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar $value = null)
    {
        $this->literal = $value;
    }

    /**
     * Check if 'function_call' has a value
     *
     * @return bool
     */
    public function hasFunctionCall()
    {
        return $this->function_call !== null;
    }

    /**
     * Get 'function_call' value
     *
     * @return \Mysqlx\Expr\FunctionCall
     */
    public function getFunctionCall()
    {
        return $this->function_call;
    }

    /**
     * Set 'function_call' value
     *
     * @param \Mysqlx\Expr\FunctionCall $value
     */
    public function setFunctionCall(\Mysqlx\Expr\FunctionCall $value = null)
    {
        $this->function_call = $value;
    }

    /**
     * Check if 'operator' has a value
     *
     * @return bool
     */
    public function hasOperator()
    {
        return $this->operator !== null;
    }

    /**
     * Get 'operator' value
     *
     * @return \Mysqlx\Expr\Operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set 'operator' value
     *
     * @param \Mysqlx\Expr\Operator $value
     */
    public function setOperator(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Operator $value = null)
    {
        $this->operator = $value;
    }

    /**
     * Check if 'position' has a value
     *
     * @return bool
     */
    public function hasPosition()
    {
        return $this->position !== null;
    }

    /**
     * Get 'position' value
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set 'position' value
     *
     * @param int $value
     */
    public function setPosition($value = null)
    {
        $this->position = $value;
    }

    /**
     * Check if 'object' has a value
     *
     * @return bool
     */
    public function hasObject()
    {
        return $this->object !== null;
    }

    /**
     * Get 'object' value
     *
     * @return \Mysqlx\Expr\Object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set 'object' value
     *
     * @param \Mysqlx\Expr\Object $value
     */
    public function setObject(\Mysqlx\Expr\Object $value = null)
    {
        $this->object = $value;
    }

    /**
     * Check if 'array' has a value
     *
     * @return bool
     */
    public function hasArray()
    {
        return $this->array !== null;
    }

    /**
     * Get 'array' value
     *
     * @return \Mysqlx\Expr\Array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Set 'array' value
     *
     * @param \Mysqlx\Expr\Array $value
     */
    public function setArray(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\ArrayObject $value = null)
    {
        $this->array = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function extensions()
    {
        if ($this->extensions !== null) {
            return $this->extensions;
        }

        return $this->extensions = new \Protobuf\Extension\ExtensionFieldMap(__CLASS__);
    }

    /**
     * {@inheritdoc}
     */
    public function unknownFieldSet()
    {
        return $this->unknownFieldSet;
    }

    /**
     * {@inheritdoc}
     */
    public static function fromStream($stream, \Protobuf\Configuration $configuration = null)
    {
        return new self($stream, $configuration);
    }

    /**
     * {@inheritdoc}
     */
    public static function fromArray(array $values)
    {
        if (! isset($values['type'])) {
            throw new \InvalidArgumentException('Field "type" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'identifier' => null,
            'variable' => null,
            'literal' => null,
            'function_call' => null,
            'operator' => null,
            'position' => null,
            'object' => null,
            'array' => null
        ], $values);

        $message->setType($values['type']);
        $message->setIdentifier($values['identifier']);
        $message->setVariable($values['variable']);
        $message->setLiteral($values['literal']);
        $message->setFunctionCall($values['function_call']);
        $message->setOperator($values['operator']);
        $message->setPosition($values['position']);
        $message->setObject($values['object']);
        $message->setArray($values['array']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Expr',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Expr.Expr.Type'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'identifier',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.ColumnIdentifier'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'variable',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'literal',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 5,
                    'name' => 'function_call',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.FunctionCall'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 6,
                    'name' => 'operator',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.Operator'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 7,
                    'name' => 'position',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 8,
                    'name' => 'object',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.Object'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 9,
                    'name' => 'array',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.Array'
                ]),
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function toStream(\Protobuf\Configuration $configuration = null)
    {
        $config  = $configuration ?: \Protobuf\Configuration::getInstance();
        $context = $config->createWriteContext();
        $stream  = $context->getStream();

        $this->writeTo($context);
        $stream->seek(0);

        return $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function writeTo(\Protobuf\WriteContext $context)
    {
        $stream      = $context->getStream();
        $writer      = $context->getWriter();
        $sizeContext = $context->getComputeSizeContext();

        if ($this->type === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Expr\\Expr#type" (tag 1) is required but has no value.');
        }

        if ($this->type !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->type->value());
        }

        if ($this->identifier !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeVarint($stream, $this->identifier->serializedSize($sizeContext));
            $this->identifier->writeTo($context);
        }

        if ($this->variable !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeString($stream, $this->variable);
        }

        if ($this->literal !== null) {
            $writer->writeVarint($stream, 34);
            $writer->writeVarint($stream, $this->literal->serializedSize($sizeContext));
            $this->literal->writeTo($context);
        }

        if ($this->function_call !== null) {
            $writer->writeVarint($stream, 42);
            $writer->writeVarint($stream, $this->function_call->serializedSize($sizeContext));
            $this->function_call->writeTo($context);
        }

        if ($this->operator !== null) {
            $writer->writeVarint($stream, 50);
            $writer->writeVarint($stream, $this->operator->serializedSize($sizeContext));
            $this->operator->writeTo($context);
        }

        if ($this->position !== null) {
            $writer->writeVarint($stream, 56);
            $writer->writeVarint($stream, $this->position);
        }

        if ($this->object !== null) {
            $writer->writeVarint($stream, 66);
            $writer->writeVarint($stream, $this->object->serializedSize($sizeContext));
            $this->object->writeTo($context);
        }

        if ($this->array !== null) {
            $writer->writeVarint($stream, 74);
            $writer->writeVarint($stream, $this->array->serializedSize($sizeContext));
            $this->array->writeTo($context);
        }

        if ($this->extensions !== null) {
            $this->extensions->writeTo($context);
        }

        return $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function readFrom(\Protobuf\ReadContext $context)
    {
        $reader = $context->getReader();
        $length = $context->getLength();
        $stream = $context->getStream();

        $limit = ($length !== null)
            ? ($stream->tell() + $length)
            : null;

        while ($limit === null || $stream->tell() < $limit) {
            if ($stream->eof()) {
                break;
            }

            $key  = $reader->readVarint($stream);
            $wire = \Protobuf\WireFormat::getTagWireType($key);
            $tag  = \Protobuf\WireFormat::getTagFieldNumber($key);

            if ($stream->eof()) {
                break;
            }

            if ($tag === 1) {
                \Protobuf\WireFormat::assertWireType($wire, 14);

                $this->type = \Mysqlx\Expr\Expr\Type::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\ColumnIdentifier();

                $this->identifier = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->variable = $reader->readString($stream);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Datatypes\Scalar();

                $this->literal = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 5) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\FunctionCall();

                $this->function_call = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 6) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Operator();

                $this->operator = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 7) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->position = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 8) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Object();

                $this->object = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 9) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Expr\ArrayObject();

                $this->array = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            $extensions = $context->getExtensionRegistry();
            $extension  = $extensions ? $extensions->findByNumber(__CLASS__, $tag) : null;

            if ($extension !== null) {
                $this->extensions()->add($extension, $extension->readFrom($context, $wire));

                continue;
            }

            if ($this->unknownFieldSet === null) {
                $this->unknownFieldSet = new \Protobuf\UnknownFieldSet();
            }

            $data    = $reader->readUnknown($stream, $wire);
            $unknown = new \Protobuf\Unknown($tag, $wire, $data);

            $this->unknownFieldSet->add($unknown);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function serializedSize(\Protobuf\ComputeSizeContext $context)
    {
        $calculator = $context->getSizeCalculator();
        $size       = 0;

        if ($this->type !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->type->value());
        }

        if ($this->identifier !== null) {
            $innerSize = $this->identifier->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->variable !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->variable);
        }

        if ($this->literal !== null) {
            $innerSize = $this->literal->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->function_call !== null) {
            $innerSize = $this->function_call->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->operator !== null) {
            $innerSize = $this->operator->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->position !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->position);
        }

        if ($this->object !== null) {
            $innerSize = $this->object->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->array !== null) {
            $innerSize = $this->array->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->extensions !== null) {
            $size += $this->extensions->serializedSize($context);
        }

        return $size;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->type = null;
        $this->identifier = null;
        $this->variable = null;
        $this->literal = null;
        $this->function_call = null;
        $this->operator = null;
        $this->position = null;
        $this->object = null;
        $this->array = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Expr\Expr) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->type = ($message->type !== null) ? $message->type : $this->type;
        $this->identifier = ($message->identifier !== null) ? $message->identifier : $this->identifier;
        $this->variable = ($message->variable !== null) ? $message->variable : $this->variable;
        $this->literal = ($message->literal !== null) ? $message->literal : $this->literal;
        $this->function_call = ($message->function_call !== null) ? $message->function_call : $this->function_call;
        $this->operator = ($message->operator !== null) ? $message->operator : $this->operator;
        $this->position = ($message->position !== null) ? $message->position : $this->position;
        $this->object = ($message->object !== null) ? $message->object : $this->object;
        $this->array = ($message->array !== null) ? $message->array : $this->array;
    }
}
