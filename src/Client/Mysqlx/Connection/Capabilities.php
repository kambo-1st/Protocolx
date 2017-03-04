<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Connection;

/**
 * Protobuf message : Mysqlx.Connection.Capabilities
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Connection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Capabilities extends \Protobuf\AbstractMessage
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
     * capabilities repeated message = 1
     *
     * @var \Protobuf\Collection<\Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability>
     */
    protected $capabilities = null;

    /**
     * Check if 'capabilities' has a value
     *
     * @return bool
     */
    public function hasCapabilitiesList()
    {
        return $this->capabilities !== null;
    }

    /**
     * Get 'capabilities' value
     *
     * @return \Protobuf\Collection<\Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability>
     */
    public function getCapabilitiesList()
    {
        return $this->capabilities;
    }

    /**
     * Set 'capabilities' value
     *
     * @param \Protobuf\Collection<\Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability> $value
     */
    public function setCapabilitiesList(\Protobuf\Collection $value = null)
    {
        $this->capabilities = $value;
    }

    /**
     * Add a new element to 'capabilities'
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability $value
     */
    public function addCapabilities(\Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability $value)
    {
        if ($this->capabilities === null) {
            $this->capabilities = new \Protobuf\MessageCollection();
        }

        $this->capabilities->add($value);
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
        $message = new self();
        $values  = array_merge([
            'capabilities' => []
        ], $values);

        foreach ($values['capabilities'] as $item) {
            $message->addCapabilities($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Capabilities',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'capabilities',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Connection.Capability'
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

        if ($this->capabilities !== null) {
            foreach ($this->capabilities as $val) {
                $writer->writeVarint($stream, 10);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
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
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability();

                if ($this->capabilities === null) {
                    $this->capabilities = new \Protobuf\MessageCollection();
                }

                $this->capabilities->add($innerMessage);

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

        if ($this->capabilities !== null) {
            foreach ($this->capabilities as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
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
        $this->capabilities = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->capabilities = ($message->capabilities !== null) ? $message->capabilities : $this->capabilities;
    }
}
