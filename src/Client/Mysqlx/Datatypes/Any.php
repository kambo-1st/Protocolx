<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes;

/**
 * Protobuf message : Mysqlx.Datatypes.Any
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Any extends \Protobuf\AbstractMessage
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
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type
     */
    protected $type = null;

    /**
     * scalar optional message = 2
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar
     */
    protected $scalar = null;

    /**
     * obj optional message = 3
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Object
     */
    protected $obj = null;

    /**
     * array optional message = 4
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Array
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
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set 'type' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type $value
     */
    public function setType(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type $value)
    {
        $this->type = $value;
    }

    /**
     * Check if 'scalar' has a value
     *
     * @return bool
     */
    public function hasScalar()
    {
        return $this->scalar !== null;
    }

    /**
     * Get 'scalar' value
     *
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar
     */
    public function getScalar()
    {
        return $this->scalar;
    }

    /**
     * Set 'scalar' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar $value
     */
    public function setScalar(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar $value = null)
    {
        $this->scalar = $value;
    }

    /**
     * Check if 'obj' has a value
     *
     * @return bool
     */
    public function hasObj()
    {
        return $this->obj !== null;
    }

    /**
     * Get 'obj' value
     *
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Object
     */
    public function getObj()
    {
        return $this->obj;
    }

    /**
     * Set 'obj' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Object $value
     */
    public function setObj(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Object $value = null)
    {
        $this->obj = $value;
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
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Set 'array' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Array $value
     */
    public function setArray($value = null)
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
            'scalar' => null,
            'obj' => null,
            'array' => null
        ], $values);

        $message->setType($values['type']);
        $message->setScalar($values['scalar']);
        $message->setObj($values['obj']);
        $message->setArray($values['array']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Any',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Datatypes.Any.Type'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'scalar',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'obj',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Object'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'array',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Array'
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
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Datatypes\\Any#type" (tag 1) is required but has no value.');
        }

        if ($this->type !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->type->value());
        }

        if ($this->scalar !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeVarint($stream, $this->scalar->serializedSize($sizeContext));
            $this->scalar->writeTo($context);
        }

        if ($this->obj !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeVarint($stream, $this->obj->serializedSize($sizeContext));
            $this->obj->writeTo($context);
        }

        if ($this->array !== null) {
            $writer->writeVarint($stream, 34);
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

                $this->type = \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar();

                $this->scalar = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Object();

                $this->obj = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\ArrayObject();

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

        if ($this->scalar !== null) {
            $innerSize = $this->scalar->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->obj !== null) {
            $innerSize = $this->obj->serializedSize($context);

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
        $this->scalar = null;
        $this->obj = null;
        $this->array = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->type = ($message->type !== null) ? $message->type : $this->type;
        $this->scalar = ($message->scalar !== null) ? $message->scalar : $this->scalar;
        $this->obj = ($message->obj !== null) ? $message->obj : $this->obj;
        $this->array = ($message->array !== null) ? $message->array : $this->array;
    }
}
