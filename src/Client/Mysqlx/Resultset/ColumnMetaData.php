<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Resultset;

/**
 * Protobuf message : Mysqlx.Resultset.ColumnMetaData
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Resultset
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class ColumnMetaData extends \Protobuf\AbstractMessage
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
     * @var \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    protected $type = null;

    /**
     * name optional bytes = 2
     *
     * @var \Protobuf\Stream
     */
    protected $name = null;

    /**
     * original_name optional bytes = 3
     *
     * @var \Protobuf\Stream
     */
    protected $original_name = null;

    /**
     * table optional bytes = 4
     *
     * @var \Protobuf\Stream
     */
    protected $table = null;

    /**
     * original_table optional bytes = 5
     *
     * @var \Protobuf\Stream
     */
    protected $original_table = null;

    /**
     * schema optional bytes = 6
     *
     * @var \Protobuf\Stream
     */
    protected $schema = null;

    /**
     * catalog optional bytes = 7
     *
     * @var \Protobuf\Stream
     */
    protected $catalog = null;

    /**
     * collation optional uint64 = 8
     *
     * @var int
     */
    protected $collation = null;

    /**
     * fractional_digits optional uint32 = 9
     *
     * @var int
     */
    protected $fractional_digits = null;

    /**
     * length optional uint32 = 10
     *
     * @var int
     */
    protected $length = null;

    /**
     * flags optional uint32 = 11
     *
     * @var int
     */
    protected $flags = null;

    /**
     * content_type optional uint32 = 12
     *
     * @var int
     */
    protected $content_type = null;

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
     * @return \Mysqlx\Resultset\ColumnMetaData\FieldType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set 'type' value
     *
     * @param \Mysqlx\Resultset\ColumnMetaData\FieldType $value
     */
    public function setType(\Mysqlx\Resultset\ColumnMetaData\FieldType $value)
    {
        $this->type = $value;
    }

    /**
     * Check if 'name' has a value
     *
     * @return bool
     */
    public function hasName()
    {
        return $this->name !== null;
    }

    /**
     * Get 'name' value
     *
     * @return \Protobuf\Stream
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set 'name' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setName($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->name = $value;
    }

    /**
     * Check if 'original_name' has a value
     *
     * @return bool
     */
    public function hasOriginalName()
    {
        return $this->original_name !== null;
    }

    /**
     * Get 'original_name' value
     *
     * @return \Protobuf\Stream
     */
    public function getOriginalName()
    {
        return $this->original_name;
    }

    /**
     * Set 'original_name' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setOriginalName($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->original_name = $value;
    }

    /**
     * Check if 'table' has a value
     *
     * @return bool
     */
    public function hasTable()
    {
        return $this->table !== null;
    }

    /**
     * Get 'table' value
     *
     * @return \Protobuf\Stream
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set 'table' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setTable($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->table = $value;
    }

    /**
     * Check if 'original_table' has a value
     *
     * @return bool
     */
    public function hasOriginalTable()
    {
        return $this->original_table !== null;
    }

    /**
     * Get 'original_table' value
     *
     * @return \Protobuf\Stream
     */
    public function getOriginalTable()
    {
        return $this->original_table;
    }

    /**
     * Set 'original_table' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setOriginalTable($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->original_table = $value;
    }

    /**
     * Check if 'schema' has a value
     *
     * @return bool
     */
    public function hasSchema()
    {
        return $this->schema !== null;
    }

    /**
     * Get 'schema' value
     *
     * @return \Protobuf\Stream
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * Set 'schema' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setSchema($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->schema = $value;
    }

    /**
     * Check if 'catalog' has a value
     *
     * @return bool
     */
    public function hasCatalog()
    {
        return $this->catalog !== null;
    }

    /**
     * Get 'catalog' value
     *
     * @return \Protobuf\Stream
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * Set 'catalog' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setCatalog($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->catalog = $value;
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
     * Check if 'fractional_digits' has a value
     *
     * @return bool
     */
    public function hasFractionalDigits()
    {
        return $this->fractional_digits !== null;
    }

    /**
     * Get 'fractional_digits' value
     *
     * @return int
     */
    public function getFractionalDigits()
    {
        return $this->fractional_digits;
    }

    /**
     * Set 'fractional_digits' value
     *
     * @param int $value
     */
    public function setFractionalDigits($value = null)
    {
        $this->fractional_digits = $value;
    }

    /**
     * Check if 'length' has a value
     *
     * @return bool
     */
    public function hasLength()
    {
        return $this->length !== null;
    }

    /**
     * Get 'length' value
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set 'length' value
     *
     * @param int $value
     */
    public function setLength($value = null)
    {
        $this->length = $value;
    }

    /**
     * Check if 'flags' has a value
     *
     * @return bool
     */
    public function hasFlags()
    {
        return $this->flags !== null;
    }

    /**
     * Get 'flags' value
     *
     * @return int
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set 'flags' value
     *
     * @param int $value
     */
    public function setFlags($value = null)
    {
        $this->flags = $value;
    }

    /**
     * Check if 'content_type' has a value
     *
     * @return bool
     */
    public function hasContentType()
    {
        return $this->content_type !== null;
    }

    /**
     * Get 'content_type' value
     *
     * @return int
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set 'content_type' value
     *
     * @param int $value
     */
    public function setContentType($value = null)
    {
        $this->content_type = $value;
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
            'name' => null,
            'original_name' => null,
            'table' => null,
            'original_table' => null,
            'schema' => null,
            'catalog' => null,
            'collation' => null,
            'fractional_digits' => null,
            'length' => null,
            'flags' => null,
            'content_type' => null
        ], $values);

        $message->setType($values['type']);
        $message->setName($values['name']);
        $message->setOriginalName($values['original_name']);
        $message->setTable($values['table']);
        $message->setOriginalTable($values['original_table']);
        $message->setSchema($values['schema']);
        $message->setCatalog($values['catalog']);
        $message->setCollation($values['collation']);
        $message->setFractionalDigits($values['fractional_digits']);
        $message->setLength($values['length']);
        $message->setFlags($values['flags']);
        $message->setContentType($values['content_type']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'ColumnMetaData',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Resultset.ColumnMetaData.FieldType'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'original_name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'table',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 5,
                    'name' => 'original_table',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 6,
                    'name' => 'schema',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 7,
                    'name' => 'catalog',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 8,
                    'name' => 'collation',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT64(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 9,
                    'name' => 'fractional_digits',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 10,
                    'name' => 'length',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 11,
                    'name' => 'flags',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 12,
                    'name' => 'content_type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
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
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Resultset\\ColumnMetaData#type" (tag 1) is required but has no value.');
        }

        if ($this->type !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->type->value());
        }

        if ($this->name !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeByteStream($stream, $this->name);
        }

        if ($this->original_name !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeByteStream($stream, $this->original_name);
        }

        if ($this->table !== null) {
            $writer->writeVarint($stream, 34);
            $writer->writeByteStream($stream, $this->table);
        }

        if ($this->original_table !== null) {
            $writer->writeVarint($stream, 42);
            $writer->writeByteStream($stream, $this->original_table);
        }

        if ($this->schema !== null) {
            $writer->writeVarint($stream, 50);
            $writer->writeByteStream($stream, $this->schema);
        }

        if ($this->catalog !== null) {
            $writer->writeVarint($stream, 58);
            $writer->writeByteStream($stream, $this->catalog);
        }

        if ($this->collation !== null) {
            $writer->writeVarint($stream, 64);
            $writer->writeVarint($stream, $this->collation);
        }

        if ($this->fractional_digits !== null) {
            $writer->writeVarint($stream, 72);
            $writer->writeVarint($stream, $this->fractional_digits);
        }

        if ($this->length !== null) {
            $writer->writeVarint($stream, 80);
            $writer->writeVarint($stream, $this->length);
        }

        if ($this->flags !== null) {
            $writer->writeVarint($stream, 88);
            $writer->writeVarint($stream, $this->flags);
        }

        if ($this->content_type !== null) {
            $writer->writeVarint($stream, 96);
            $writer->writeVarint($stream, $this->content_type);
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

                $this->type = \Kambo\Database\Protocolx\Client\Mysqlx\Resultset\ColumnMetaData\FieldType::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->name = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->original_name = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->table = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 5) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->original_table = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 6) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->schema = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 7) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->catalog = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 8) {
                \Protobuf\WireFormat::assertWireType($wire, 4);

                $this->collation = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 9) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->fractional_digits = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 10) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->length = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 11) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->flags = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 12) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->content_type = $reader->readVarint($stream);

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

        if ($this->name !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->name);
        }

        if ($this->original_name !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->original_name);
        }

        if ($this->table !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->table);
        }

        if ($this->original_table !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->original_table);
        }

        if ($this->schema !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->schema);
        }

        if ($this->catalog !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->catalog);
        }

        if ($this->collation !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->collation);
        }

        if ($this->fractional_digits !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->fractional_digits);
        }

        if ($this->length !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->length);
        }

        if ($this->flags !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->flags);
        }

        if ($this->content_type !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->content_type);
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
        $this->name = null;
        $this->original_name = null;
        $this->table = null;
        $this->original_table = null;
        $this->schema = null;
        $this->catalog = null;
        $this->collation = null;
        $this->fractional_digits = null;
        $this->length = null;
        $this->flags = null;
        $this->content_type = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Resultset\ColumnMetaData) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->type = ($message->type !== null) ? $message->type : $this->type;
        $this->name = ($message->name !== null) ? $message->name : $this->name;
        $this->original_name = ($message->original_name !== null) ? $message->original_name : $this->original_name;
        $this->table = ($message->table !== null) ? $message->table : $this->table;
        $this->original_table = ($message->original_table !== null) ? $message->original_table : $this->original_table;
        $this->schema = ($message->schema !== null) ? $message->schema : $this->schema;
        $this->catalog = ($message->catalog !== null) ? $message->catalog : $this->catalog;
        $this->collation = ($message->collation !== null) ? $message->collation : $this->collation;
        $this->fractional_digits = ($message->fractional_digits !== null) ? $message->fractional_digits : $this->fractional_digits;
        $this->length = ($message->length !== null) ? $message->length : $this->length;
        $this->flags = ($message->flags !== null) ? $message->flags : $this->flags;
        $this->content_type = ($message->content_type !== null) ? $message->content_type : $this->content_type;
    }
}
