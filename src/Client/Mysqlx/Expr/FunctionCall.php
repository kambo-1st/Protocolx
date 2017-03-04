<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Expr;

/**
 * Protobuf message : Mysqlx.Expr.FunctionCall
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Expr
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class FunctionCall extends \Protobuf\AbstractMessage
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
     * name required message = 1
     *
     * @var \Mysqlx\Expr\Identifier
     */
    protected $name = null;

    /**
     * param repeated message = 2
     *
     * @var \Protobuf\Collection<\Mysqlx\Expr\Expr>
     */
    protected $param = null;

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
     * @return \Mysqlx\Expr\Identifier
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set 'name' value
     *
     * @param \Mysqlx\Expr\Identifier $value
     */
    public function setName(\Mysqlx\Expr\Identifier $value)
    {
        $this->name = $value;
    }

    /**
     * Check if 'param' has a value
     *
     * @return bool
     */
    public function hasParamList()
    {
        return $this->param !== null;
    }

    /**
     * Get 'param' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Expr\Expr>
     */
    public function getParamList()
    {
        return $this->param;
    }

    /**
     * Set 'param' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Expr\Expr> $value
     */
    public function setParamList(\Protobuf\Collection $value = null)
    {
        $this->param = $value;
    }

    /**
     * Add a new element to 'param'
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function addParam(\Mysqlx\Expr\Expr $value)
    {
        if ($this->param === null) {
            $this->param = new \Protobuf\MessageCollection();
        }

        $this->param->add($value);
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
        if (! isset($values['name'])) {
            throw new \InvalidArgumentException('Field "name" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'param' => []
        ], $values);

        $message->setName($values['name']);

        foreach ($values['param'] as $item) {
            $message->addParam($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'FunctionCall',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Expr.Identifier'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'param',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Expr.Expr'
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

        if ($this->name === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Expr\\FunctionCall#name" (tag 1) is required but has no value.');
        }

        if ($this->name !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeVarint($stream, $this->name->serializedSize($sizeContext));
            $this->name->writeTo($context);
        }

        if ($this->param !== null) {
            foreach ($this->param as $val) {
                $writer->writeVarint($stream, 18);
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
                $innerMessage = new \Mysqlx\Expr\Identifier();

                $this->name = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Expr();

                if ($this->param === null) {
                    $this->param = new \Protobuf\MessageCollection();
                }

                $this->param->add($innerMessage);

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

        if ($this->name !== null) {
            $innerSize = $this->name->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->param !== null) {
            foreach ($this->param as $val) {
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
        $this->name = null;
        $this->param = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Expr\FunctionCall) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->name = ($message->name !== null) ? $message->name : $this->name;
        $this->param = ($message->param !== null) ? $message->param : $this->param;
    }
}
