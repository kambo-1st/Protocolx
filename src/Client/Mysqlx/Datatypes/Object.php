<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes;

/**
 * Protobuf message : Mysqlx.Sql.StmtExecuteOk
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Object extends \Protobuf\AbstractMessage
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
     * fld repeated message = 1
     *
     * @var \Protobuf\Collection<\Mysqlx\Datatypes\Object\ObjectField>
     */
    protected $fld = null;

    /**
     * Check if 'fld' has a value
     *
     * @return bool
     */
    public function hasFldList()
    {
        return $this->fld !== null;
    }

    /**
     * Get 'fld' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Datatypes\Object\ObjectField>
     */
    public function getFldList()
    {
        return $this->fld;
    }

    /**
     * Set 'fld' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Datatypes\Object\ObjectField> $value
     */
    public function setFldList(\Protobuf\Collection $value = null)
    {
        $this->fld = $value;
    }

    /**
     * Add a new element to 'fld'
     *
     * @param \Mysqlx\Datatypes\Object\ObjectField $value
     */
    public function addFld(\Mysqlx\Datatypes\Object\ObjectField $value)
    {
        if ($this->fld === null) {
            $this->fld = new \Protobuf\MessageCollection();
        }

        $this->fld->add($value);
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
            'fld' => []
        ], $values);

        foreach ($values['fld'] as $item) {
            $message->addFld($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Object',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'fld',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Datatypes.Object.ObjectField'
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

        if ($this->fld !== null) {
            foreach ($this->fld as $val) {
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
                $innerMessage = new \Mysqlx\Datatypes\Object\ObjectField();

                if ($this->fld === null) {
                    $this->fld = new \Protobuf\MessageCollection();
                }

                $this->fld->add($innerMessage);

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

        if ($this->fld !== null) {
            foreach ($this->fld as $val) {
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
        $this->fld = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Datatypes\Object) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->fld = ($message->fld !== null) ? $message->fld : $this->fld;
    }
}
