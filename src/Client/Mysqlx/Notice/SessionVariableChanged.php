<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice;

/**
 * Protobuf message : Mysqlx.Notice.SessionVariableChanged
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Notice
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class SessionVariableChanged extends \Protobuf\AbstractMessage
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
     * param required string = 1
     *
     * @var string
     */
    protected $param = null;

    /**
     * value optional message = 2
     *
     * @var \Mysqlx\Datatypes\Scalar
     */
    protected $value = null;

    /**
     * Check if 'param' has a value
     *
     * @return bool
     */
    public function hasParam()
    {
        return $this->param !== null;
    }

    /**
     * Get 'param' value
     *
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set 'param' value
     *
     * @param string $value
     */
    public function setParam($value)
    {
        $this->param = $value;
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
     * @return \Mysqlx\Datatypes\Scalar
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set 'value' value
     *
     * @param \Mysqlx\Datatypes\Scalar $value
     */
    public function setValue(\Mysqlx\Datatypes\Scalar $value = null)
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
        if (! isset($values['param'])) {
            throw new \InvalidArgumentException('Field "param" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'value' => null
        ], $values);

        $message->setParam($values['param']);
        $message->setValue($values['value']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'SessionVariableChanged',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'param',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'value',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar'
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

        if ($this->param === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Notice\\SessionVariableChanged#param" (tag 1) is required but has no value.');
        }

        if ($this->param !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeString($stream, $this->param);
        }

        if ($this->value !== null) {
            $writer->writeVarint($stream, 18);
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
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->param = $reader->readString($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Datatypes\Scalar();

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

        if ($this->param !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->param);
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
        $this->param = null;
        $this->value = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Notice\SessionVariableChanged) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->param = ($message->param !== null) ? $message->param : $this->param;
        $this->value = ($message->value !== null) ? $message->value : $this->value;
    }
}
