<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Expr;

/**
 * Protobuf message : Mysqlx.Expr.ColumnIdentifier
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class ColumnIdentifier extends \Protobuf\AbstractMessage
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
     * document_path repeated message = 1
     *
     * @var \Protobuf\Collection<\Mysqlx\Expr\DocumentPathItem>
     */
    protected $document_path = null;

    /**
     * name optional string = 2
     *
     * @var string
     */
    protected $name = null;

    /**
     * table_name optional string = 3
     *
     * @var string
     */
    protected $table_name = null;

    /**
     * schema_name optional string = 4
     *
     * @var string
     */
    protected $schema_name = null;

    /**
     * Check if 'document_path' has a value
     *
     * @return bool
     */
    public function hasDocumentPathList()
    {
        return $this->document_path !== null;
    }

    /**
     * Get 'document_path' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Expr\DocumentPathItem>
     */
    public function getDocumentPathList()
    {
        return $this->document_path;
    }

    /**
     * Set 'document_path' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Expr\DocumentPathItem> $value
     */
    public function setDocumentPathList(\Protobuf\Collection $value = null)
    {
        $this->document_path = $value;
    }

    /**
     * Add a new element to 'document_path'
     *
     * @param \Mysqlx\Expr\DocumentPathItem $value
     */
    public function addDocumentPath(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\DocumentPathItem $value)
    {
        if ($this->document_path === null) {
            $this->document_path = new \Protobuf\MessageCollection();
        }

        $this->document_path->add($value);
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set 'name' value
     *
     * @param string $value
     */
    public function setName($value = null)
    {
        $this->name = $value;
    }

    /**
     * Check if 'table_name' has a value
     *
     * @return bool
     */
    public function hasTableName()
    {
        return $this->table_name !== null;
    }

    /**
     * Get 'table_name' value
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->table_name;
    }

    /**
     * Set 'table_name' value
     *
     * @param string $value
     */
    public function setTableName($value = null)
    {
        $this->table_name = $value;
    }

    /**
     * Check if 'schema_name' has a value
     *
     * @return bool
     */
    public function hasSchemaName()
    {
        return $this->schema_name !== null;
    }

    /**
     * Get 'schema_name' value
     *
     * @return string
     */
    public function getSchemaName()
    {
        return $this->schema_name;
    }

    /**
     * Set 'schema_name' value
     *
     * @param string $value
     */
    public function setSchemaName($value = null)
    {
        $this->schema_name = $value;
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
            'document_path' => [],
            'name' => null,
            'table_name' => null,
            'schema_name' => null
        ], $values);

        $message->setName($values['name']);
        $message->setTableName($values['table_name']);
        $message->setSchemaName($values['schema_name']);

        foreach ($values['document_path'] as $item) {
            $message->addDocumentPath($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'ColumnIdentifier',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'document_path',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Expr.DocumentPathItem'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'table_name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'schema_name',
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

        if ($this->document_path !== null) {
            foreach ($this->document_path as $val) {
                $writer->writeVarint($stream, 10);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->name !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeString($stream, $this->name);
        }

        if ($this->table_name !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeString($stream, $this->table_name);
        }

        if ($this->schema_name !== null) {
            $writer->writeVarint($stream, 34);
            $writer->writeString($stream, $this->schema_name);
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
                $innerMessage = new \Mysqlx\Expr\DocumentPathItem();

                if ($this->document_path === null) {
                    $this->document_path = new \Protobuf\MessageCollection();
                }

                $this->document_path->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->name = $reader->readString($stream);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->table_name = $reader->readString($stream);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->schema_name = $reader->readString($stream);

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

        if ($this->document_path !== null) {
            foreach ($this->document_path as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->name !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->name);
        }

        if ($this->table_name !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->table_name);
        }

        if ($this->schema_name !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->schema_name);
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
        $this->document_path = null;
        $this->name = null;
        $this->table_name = null;
        $this->schema_name = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Expr\ColumnIdentifier) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->document_path = ($message->document_path !== null) ? $message->document_path : $this->document_path;
        $this->name = ($message->name !== null) ? $message->name : $this->name;
        $this->table_name = ($message->table_name !== null) ? $message->table_name : $this->table_name;
        $this->schema_name = ($message->schema_name !== null) ? $message->schema_name : $this->schema_name;
    }
}
