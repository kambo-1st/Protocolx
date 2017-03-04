<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar;

/**
 * Protobuf message : Mysqlx.Datatypes.Scalar.String
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class String extends \Protobuf\AbstractMessage
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
     * value required bytes = 1
     *
     * @var \Protobuf\Stream
     */
    protected $value = null;

    /**
     * collation optional uint64 = 2
     *
     * @var int
     */
    protected $collation = null;

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
     * @return \Protobuf\Stream
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set 'value' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setValue($value)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->value = $value;
    }

    /**
     * Check if 'collation' has a value
     *
     * @return bool
     */
    public function hasCollation()
    {
        return $this->collation !== null;
    }

    /**
     * Get 'collation' value
     *
     * @return int
     */
    public function getCollation()
    {
        return $this->collation;
    }

    /**
     * Set 'collation' value
     *
     * @param int $value
     */
    public function setCollation($value = null)
    {
        $this->collation = $value;
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
        if (! isset($values['value'])) {
            throw new \InvalidArgumentException('Field "value" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'collation' => null
        ], $values);

        $message->setValue($values['value']);
        $message->setCollation($values['collation']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'String',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'value',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'collation',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT64(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
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

        if ($this->value === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Datatypes\\Scalar\\String#value" (tag 1) is required but has no value.');
        }

        if ($this->value !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeByteStream($stream, $this->value);
        }

        if ($this->collation !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->collation);
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
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->value = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 4);

                $this->collation = $reader->readVarint($stream);

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

        if ($this->value !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->value);
        }

        if ($this->collation !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->collation);
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
        $this->value = null;
        $this->collation = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Datatypes\Scalar\String) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->value = ($message->value !== null) ? $message->value : $this->value;
        $this->collation = ($message->collation !== null) ? $message->collation : $this->collation;
    }
}
