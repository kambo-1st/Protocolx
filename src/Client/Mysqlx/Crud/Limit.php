<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf message : Mysqlx.Crud.Limit
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Limit extends \Protobuf\AbstractMessage
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
     * row_count required uint64 = 1
     *
     * @var int
     */
    protected $row_count = null;

    /**
     * offset optional uint64 = 2
     *
     * @var int
     */
    protected $offset = null;

    /**
     * Check if 'row_count' has a value
     *
     * @return bool
     */
    public function hasRowCount()
    {
        return $this->row_count !== null;
    }

    /**
     * Get 'row_count' value
     *
     * @return int
     */
    public function getRowCount()
    {
        return $this->row_count;
    }

    /**
     * Set 'row_count' value
     *
     * @param int $value
     */
    public function setRowCount($value)
    {
        $this->row_count = $value;
    }

    /**
     * Check if 'offset' has a value
     *
     * @return bool
     */
    public function hasOffset()
    {
        return $this->offset !== null;
    }

    /**
     * Get 'offset' value
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Set 'offset' value
     *
     * @param int $value
     */
    public function setOffset($value = null)
    {
        $this->offset = $value;
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
        if (! isset($values['row_count'])) {
            throw new \InvalidArgumentException('Field "row_count" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'offset' => null
        ], $values);

        $message->setRowCount($values['row_count']);
        $message->setOffset($values['offset']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Limit',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'row_count',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT64(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'offset',
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

        if ($this->row_count === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\Limit#row_count" (tag 1) is required but has no value.');
        }

        if ($this->row_count !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->row_count);
        }

        if ($this->offset !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->offset);
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
                \Protobuf\WireFormat::assertWireType($wire, 4);

                $this->row_count = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 4);

                $this->offset = $reader->readVarint($stream);

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

        if ($this->row_count !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->row_count);
        }

        if ($this->offset !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->offset);
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
        $this->row_count = null;
        $this->offset = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Crud\Limit) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->row_count = ($message->row_count !== null) ? $message->row_count : $this->row_count;
        $this->offset = ($message->offset !== null) ? $message->offset : $this->offset;
    }
}
