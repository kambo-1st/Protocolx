<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Connection;

/**
 * Protobuf message : Mysqlx.Connection.CapabilitiesSet
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Connection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class CapabilitiesSet extends \Protobuf\AbstractMessage
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
     * capabilities required message = 1
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities
     */
    protected $capabilities = null;

    /**
     * Check if 'capabilities' has a value
     *
     * @return bool
     */
    public function hasCapabilities()
    {
        return $this->capabilities !== null;
    }

    /**
     * Get 'capabilities' value
     *
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * Set 'capabilities' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities $value
     */
    public function setCapabilities(\Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities $value)
    {
        $this->capabilities = $value;
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
        if (! isset($values['capabilities'])) {
            throw new \InvalidArgumentException('Field "capabilities" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
        ], $values);

        $message->setCapabilities($values['capabilities']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'CapabilitiesSet',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'capabilities',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Connection.Capabilities'
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

        if ($this->capabilities === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Connection\\CapabilitiesSet#capabilities" (tag 1) is required but has no value.');
        }

        if ($this->capabilities !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeVarint($stream, $this->capabilities->serializedSize($sizeContext));
            $this->capabilities->writeTo($context);
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
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities();

                $this->capabilities = $innerMessage;

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
            $innerSize = $this->capabilities->serializedSize($context);

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
        $this->capabilities = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Kambo\Database\Protocolx\Client\Mysqlx\Connection\CapabilitiesSet) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->capabilities = ($message->capabilities !== null) ? $message->capabilities : $this->capabilities;
    }
}
