<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Sql;

/**
 * Protobuf message : Mysqlx.Sql.StmtExecute
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Sql
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class StmtExecute extends \Protobuf\AbstractMessage
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
     * namespace optional string = 3
     *
     * @var string
     */
    protected $namespace = null;

    /**
     * stmt required bytes = 1
     *
     * @var \Protobuf\Stream
     */
    protected $stmt = null;

    /**
     * args repeated message = 2
     *
     * @var \Protobuf\Collection<\Mysqlx\Datatypes\Any>
     */
    protected $args = null;

    /**
     * compact_metadata optional bool = 4
     *
     * @var bool
     */
    protected $compact_metadata = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        $stream = null,
        \Protobuf\Configuration $configuration = null
    ) {
        $this->namespace = 'sql';
        $this->compact_metadata = false;

        parent::__construct($stream, $configuration);
    }

    /**
     * Check if 'namespace' has a value
     *
     * @return bool
     */
    public function hasNamespace()
    {
        return $this->namespace !== null;
    }

    /**
     * Get 'namespace' value
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Set 'namespace' value
     *
     * @param string $value
     */
    public function setNamespace($value = null)
    {
        $this->namespace = $value;
    }

    /**
     * Check if 'stmt' has a value
     *
     * @return bool
     */
    public function hasStmt()
    {
        return $this->stmt !== null;
    }

    /**
     * Get 'stmt' value
     *
     * @return \Protobuf\Stream
     */
    public function getStmt()
    {
        return $this->stmt;
    }

    /**
     * Set 'stmt' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setStmt($value)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->stmt = $value;
    }

    /**
     * Check if 'args' has a value
     *
     * @return bool
     */
    public function hasArgsList()
    {
        return $this->args !== null;
    }

    /**
     * Get 'args' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Datatypes\Any>
     */
    public function getArgsList()
    {
        return $this->args;
    }

    /**
     * Set 'args' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Datatypes\Any> $value
     */
    public function setArgsList(\Protobuf\Collection $value = null)
    {
        $this->args = $value;
    }

    /**
     * Add a new element to 'args'
     *
     * @param \Mysqlx\Datatypes\Any $value
     */
    public function addArgs(
        \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any $value
    ) {
        if ($this->args === null) {
            $this->args = new \Protobuf\MessageCollection();
        }

        $this->args->add($value);
    }

    /**
     * Check if 'compact_metadata' has a value
     *
     * @return bool
     */
    public function hasCompactMetadata()
    {
        return $this->compact_metadata !== null;
    }

    /**
     * Get 'compact_metadata' value
     *
     * @return bool
     */
    public function getCompactMetadata()
    {
        return $this->compact_metadata;
    }

    /**
     * Set 'compact_metadata' value
     *
     * @param bool $value
     */
    public function setCompactMetadata($value = null)
    {
        $this->compact_metadata = $value;
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
        if (! isset($values['stmt'])) {
            throw new \InvalidArgumentException(
                'Field "stmt" (tag 1) is required but has no value.'
            );
        }

        $message = new self();
        $values  = array_merge([
            'namespace' => 'sql',
            'args' => [],
            'compact_metadata' => false
        ], $values);

        $message->setNamespace($values['namespace']);
        $message->setStmt($values['stmt']);
        $message->setCompactMetadata($values['compact_metadata']);

        foreach ($values['args'] as $item) {
            $message->addArgs($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'StmtExecute',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'namespace',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'default_value' => 'sql'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'stmt',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'args',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Datatypes.Any'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'compact_metadata',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BOOL(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'default_value' => false
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

        if ($this->stmt === null) {
            throw new \UnexpectedValueException(
                'Field "\\Mysqlx\\Sql\\StmtExecute#stmt" (tag 1) is required'
                . ' but has no value.'
            );
        }

        if ($this->namespace !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeString($stream, $this->namespace);
        }

        if ($this->stmt !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeByteStream($stream, $this->stmt);
        }

        if ($this->args !== null) {
            foreach ($this->args as $val) {
                $writer->writeVarint($stream, 18);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->compact_metadata !== null) {
            $writer->writeVarint($stream, 32);
            $writer->writeBool($stream, $this->compact_metadata);
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

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->namespace = $reader->readString($stream);

                continue;
            }

            if ($tag === 1) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->stmt = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Datatypes\Any();

                if ($this->args === null) {
                    $this->args = new \Protobuf\MessageCollection();
                }

                $this->args->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 8);

                $this->compact_metadata = $reader->readBool($stream);

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

        if ($this->namespace !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->namespace);
        }

        if ($this->stmt !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->stmt);
        }

        if ($this->args !== null) {
            foreach ($this->args as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->compact_metadata !== null) {
            $size += 1;
            $size += 1;
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
        $this->namespace = 'sql';
        $this->stmt = null;
        $this->args = null;
        $this->compact_metadata = false;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Sql\StmtExecute) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Argument 1 passed to %s must be a %s, %s given',
                    __METHOD__,
                    __CLASS__,
                    get_class($message)
                )
            );
        }

        $this->namespace = ($message->namespace !== null)
            ? $message->namespace
            : $this->namespace;
        $this->stmt = ($message->stmt !== null) ? $message->stmt : $this->stmt;
        $this->args = ($message->args !== null) ? $message->args : $this->args;
        $this->compact_metadata = ($message->compact_metadata !== null)
            ? $message->compact_metadata
            : $this->compact_metadata;
    }
}
