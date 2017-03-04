<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf message : Mysqlx.Crud.UpdateOperation
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class UpdateOperation extends \Protobuf\AbstractMessage
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
     * source required message = 1
     *
     * @var \Mysqlx\Expr\ColumnIdentifier
     */
    protected $source = null;

    /**
     * operation required enum = 2
     *
     * @var \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    protected $operation = null;

    /**
     * value optional message = 3
     *
     * @var \Mysqlx\Expr\Expr
     */
    protected $value = null;

    /**
     * Check if 'source' has a value
     *
     * @return bool
     */
    public function hasSource()
    {
        return $this->source !== null;
    }

    /**
     * Get 'source' value
     *
     * @return \Mysqlx\Expr\ColumnIdentifier
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set 'source' value
     *
     * @param \Mysqlx\Expr\ColumnIdentifier $value
     */
    public function setSource(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\ColumnIdentifier $value)
    {
        $this->source = $value;
    }

    /**
     * Check if 'operation' has a value
     *
     * @return bool
     */
    public function hasOperation()
    {
        return $this->operation !== null;
    }

    /**
     * Get 'operation' value
     *
     * @return \Mysqlx\Crud\UpdateOperation\UpdateType
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set 'operation' value
     *
     * @param \Mysqlx\Crud\UpdateOperation\UpdateType $value
     */
    public function setOperation(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\UpdateOperation\UpdateType $value)
    {
        $this->operation = $value;
    }

    /**
     * Check if 'value' has a value
     *
     * @return bool
     */
    public function hasValue()
    {
        return $this->value !== null;
    }

    /**
     * Get 'value' value
     *
     * @return \Mysqlx\Expr\Expr
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set 'value' value
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function setValue(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr $value = null)
    {
        $this->value = $value;
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
        if (! isset($values['source'])) {
            throw new \InvalidArgumentException('Field "source" (tag 1) is required but has no value.');
        }

        if (! isset($values['operation'])) {
            throw new \InvalidArgumentException('Field "operation" (tag 2) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'value' => null
        ], $values);

        $message->setSource($values['source']);
        $message->setOperation($values['operation']);
        $message->setValue($values['value']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'UpdateOperation',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'source',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Expr.ColumnIdentifier'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'operation',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Crud.UpdateOperation.UpdateType'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'value',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.Expr'
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

        if ($this->source === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\UpdateOperation#source" (tag 1) is required but has no value.');
        }

        if ($this->operation === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\UpdateOperation#operation" (tag 2) is required but has no value.');
        }

        if ($this->source !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeVarint($stream, $this->source->serializedSize($sizeContext));
            $this->source->writeTo($context);
        }

        if ($this->operation !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->operation->value());
        }

        if ($this->value !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeVarint($stream, $this->value->serializedSize($sizeContext));
            $this->value->writeTo($context);
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
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\ColumnIdentifier();

                $this->source = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 14);

                $this->operation = \Mysqlx\Crud\UpdateOperation\UpdateType::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Expr();

                $this->value = $innerMessage;

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

        if ($this->source !== null) {
            $innerSize = $this->source->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->operation !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->operation->value());
        }

        if ($this->value !== null) {
            $innerSize = $this->value->serializedSize($context);

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
        $this->source = null;
        $this->operation = null;
        $this->value = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Crud\UpdateOperation) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->source = ($message->source !== null) ? $message->source : $this->source;
        $this->operation = ($message->operation !== null) ? $message->operation : $this->operation;
        $this->value = ($message->value !== null) ? $message->value : $this->value;
    }
}
