<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice;

/**
 * Protobuf message : Mysqlx.Notice.Frame
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Notice
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Frame extends \Protobuf\AbstractMessage
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
     * type required uint32 = 1
     *
     * @var int
     */
    protected $type = null;

    /**
     * scope optional enum = 2
     *
     * @var \Mysqlx\Notice\Frame\Scope
     */
    protected $scope = null;

    /**
     * payload optional bytes = 3
     *
     * @var \Protobuf\Stream
     */
    protected $payload = null;

    /**
     * {@inheritdoc}
     */
    public function __construct($stream = null, \Protobuf\Configuration $configuration = null)
    {
        $this->scope = \Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame\Scope::GLOBALSCOPE();

        parent::__construct($stream, $configuration);
    }

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
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set 'type' value
     *
     * @param int $value
     */
    public function setType($value)
    {
        $this->type = $value;
    }

    /**
     * Check if 'scope' has a value
     *
     * @return bool
     */
    public function hasScope()
    {
        return $this->scope !== null;
    }

    /**
     * Get 'scope' value
     *
     * @return \Mysqlx\Notice\Frame\Scope
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set 'scope' value
     *
     * @param \Mysqlx\Notice\Frame\Scope $value
     */
    public function setScope(\Mysqlx\Notice\Frame\Scope $value = null)
    {
        $this->scope = $value;
    }

    /**
     * Check if 'payload' has a value
     *
     * @return bool
     */
    public function hasPayload()
    {
        return $this->payload !== null;
    }

    /**
     * Get 'payload' value
     *
     * @return \Protobuf\Stream
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Set 'payload' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setPayload($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->payload = $value;
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
            'scope' => \Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame::GLOBALSCOPE(),
            'payload' => null
        ], $values);

        $message->setType($values['type']);
        $message->setScope($values['scope']);
        $message->setPayload($values['payload']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Frame',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'scope',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Notice.Frame.Scope',
                    'default_value' => \Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame::GLOBALSCOPE()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'payload',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
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

        if ($this->type === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Notice\\Frame#type" (tag 1) is required but has no value.');
        }

        if ($this->type !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->type);
        }

        if ($this->scope !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->scope->value());
        }

        if ($this->payload !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeByteStream($stream, $this->payload);
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
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->type = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 14);

                $this->scope = \Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame\Scope::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->payload = $reader->readByteStream($stream);

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
            $size += $calculator->computeVarintSize($this->type);
        }

        if ($this->scope !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->scope->value());
        }

        if ($this->payload !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->payload);
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
        $this->scope = \Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame::GLOBALSCOPE();
        $this->payload = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Notice\Frame) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->type = ($message->type !== null) ? $message->type : $this->type;
        $this->scope = ($message->scope !== null) ? $message->scope : $this->scope;
        $this->payload = ($message->payload !== null) ? $message->payload : $this->payload;
    }
}
