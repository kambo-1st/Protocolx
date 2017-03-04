<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf message : Mysqlx.Crud.Order
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Order extends \Protobuf\AbstractMessage
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
     * expr required message = 1
     *
     * @var \Mysqlx\Expr\Expr
     */
    protected $expr = null;

    /**
     * direction optional enum = 2
     *
     * @var \Mysqlx\Crud\Order\Direction
     */
    protected $direction = null;

    /**
     * {@inheritdoc}
     */
    public function __construct($stream = null, \Protobuf\Configuration $configuration = null)
    {
        $this->direction = \Mysqlx\Crud\Order\Direction::ASC();

        parent::__construct($stream, $configuration);
    }

    /**
     * Check if 'expr' has a value
     *
     * @return bool
     */
    public function hasExpr()
    {
        return $this->expr !== null;
    }

    /**
     * Get 'expr' value
     *
     * @return \Mysqlx\Expr\Expr
     */
    public function getExpr()
    {
        return $this->expr;
    }

    /**
     * Set 'expr' value
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function setExpr(\Mysqlx\Expr\Expr $value)
    {
        $this->expr = $value;
    }

    /**
     * Check if 'direction' has a value
     *
     * @return bool
     */
    public function hasDirection()
    {
        return $this->direction !== null;
    }

    /**
     * Get 'direction' value
     *
     * @return \Mysqlx\Crud\Order\Direction
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set 'direction' value
     *
     * @param \Mysqlx\Crud\Order\Direction $value
     */
    public function setDirection(\Mysqlx\Crud\Order\Direction $value = null)
    {
        $this->direction = $value;
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
        if (! isset($values['expr'])) {
            throw new \InvalidArgumentException('Field "expr" (tag 1) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'direction' => \Mysqlx\Crud\Order\Direction::ASC()
        ], $values);

        $message->setExpr($values['expr']);
        $message->setDirection($values['direction']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Order',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'expr',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Expr.Expr'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'direction',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Crud.Order.Direction',
                    'default_value' => \Mysqlx\Crud\Order\Direction::ASC()
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

        if ($this->expr === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\Order#expr" (tag 1) is required but has no value.');
        }

        if ($this->expr !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeVarint($stream, $this->expr->serializedSize($sizeContext));
            $this->expr->writeTo($context);
        }

        if ($this->direction !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->direction->value());
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

                $this->expr = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 14);

                $this->direction = \Mysqlx\Crud\Order\Direction::valueOf($reader->readVarint($stream));

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

        if ($this->expr !== null) {
            $innerSize = $this->expr->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->direction !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->direction->value());
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
        $this->expr = null;
        $this->direction = \Mysqlx\Crud\Order\Direction::ASC();
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Crud\Order) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->expr = ($message->expr !== null) ? $message->expr : $this->expr;
        $this->direction = ($message->direction !== null) ? $message->direction : $this->direction;
    }
}
