<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf message : Mysqlx.Crud.Projection
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Projection extends \Protobuf\AbstractMessage
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
     * @var \Mysqlx\Expr\Expr
     */
    protected $source = null;

    /**
     * alias optional string = 2
     *
     * @var string
     */
    protected $alias = null;

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
     * @return \Mysqlx\Expr\Expr
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set 'source' value
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function setSource(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr $value)
    {
        $this->source = $value;
    }

    /**
     * Check if 'alias' has a value
     *
     * @return bool
     */
    public function hasAlias()
    {
        return $this->alias !== null;
    }

    /**
     * Get 'alias' value
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set 'alias' value
     *
     * @param string $value
     */
    public function setAlias($value = null)
    {
        $this->alias = $value;
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

        $message = new self();
        $values  = array_merge([
            'alias' => null
        ], $values);

        $message->setSource($values['source']);
        $message->setAlias($values['alias']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Projection',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'source',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Expr.Expr'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'alias',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
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

        if ($this->source === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\Projection#source" (tag 1) is required but has no value.');
        }

        if ($this->source !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeVarint($stream, $this->source->serializedSize($sizeContext));
            $this->source->writeTo($context);
        }

        if ($this->alias !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeString($stream, $this->alias);
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
                $innerMessage = new \Mysqlx\Expr\Expr();

                $this->source = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->alias = $reader->readString($stream);

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

        if ($this->alias !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->alias);
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
        $this->alias = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Crud\Projection) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->source = ($message->source !== null) ? $message->source : $this->source;
        $this->alias = ($message->alias !== null) ? $message->alias : $this->alias;
    }
}
