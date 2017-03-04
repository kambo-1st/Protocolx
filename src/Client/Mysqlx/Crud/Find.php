<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Crud;

/**
 * Protobuf message : Mysqlx.Crud.Find
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Crud
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Find extends \Protobuf\AbstractMessage
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
     * collection required message = 2
     *
     * @var \Mysqlx\Crud\Collection
     */
    protected $collection = null;

    /**
     * data_model optional enum = 3
     *
     * @var \Mysqlx\Crud\DataModel
     */
    protected $data_model = null;

    /**
     * projection repeated message = 4
     *
     * @var \Protobuf\Collection<\Mysqlx\Crud\Projection>
     */
    protected $projection = null;

    /**
     * criteria optional message = 5
     *
     * @var \Mysqlx\Expr\Expr
     */
    protected $criteria = null;

    /**
     * args repeated message = 11
     *
     * @var \Protobuf\Collection<\Mysqlx\Datatypes\Scalar>
     */
    protected $args = null;

    /**
     * limit optional message = 6
     *
     * @var \Mysqlx\Crud\Limit
     */
    protected $limit = null;

    /**
     * order repeated message = 7
     *
     * @var \Protobuf\Collection<\Mysqlx\Crud\Order>
     */
    protected $order = null;

    /**
     * grouping repeated message = 8
     *
     * @var \Protobuf\Collection<\Mysqlx\Expr\Expr>
     */
    protected $grouping = null;

    /**
     * grouping_criteria optional message = 9
     *
     * @var \Mysqlx\Expr\Expr
     */
    protected $grouping_criteria = null;

    /**
     * Check if 'collection' has a value
     *
     * @return bool
     */
    public function hasCollection()
    {
        return $this->collection !== null;
    }

    /**
     * Get 'collection' value
     *
     * @return \Mysqlx\Crud\Collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set 'collection' value
     *
     * @param \Mysqlx\Crud\Collection $value
     */
    public function setCollection(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\Collection $value)
    {
        $this->collection = $value;
    }

    /**
     * Check if 'data_model' has a value
     *
     * @return bool
     */
    public function hasDataModel()
    {
        return $this->data_model !== null;
    }

    /**
     * Get 'data_model' value
     *
     * @return \Mysqlx\Crud\DataModel
     */
    public function getDataModel()
    {
        return $this->data_model;
    }

    /**
     * Set 'data_model' value
     *
     * @param \Mysqlx\Crud\DataModel $value
     */
    public function setDataModel(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\DataModel $value = null)
    {
        $this->data_model = $value;
    }

    /**
     * Check if 'projection' has a value
     *
     * @return bool
     */
    public function hasProjectionList()
    {
        return $this->projection !== null;
    }

    /**
     * Get 'projection' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Crud\Projection>
     */
    public function getProjectionList()
    {
        return $this->projection;
    }

    /**
     * Set 'projection' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Crud\Projection> $value
     */
    public function setProjectionList(\Protobuf\Collection $value = null)
    {
        $this->projection = $value;
    }

    /**
     * Add a new element to 'projection'
     *
     * @param \Mysqlx\Crud\Projection $value
     */
    public function addProjection(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\Projection $value)
    {
        if ($this->projection === null) {
            $this->projection = new \Protobuf\MessageCollection();
        }

        $this->projection->add($value);
    }

    /**
     * Check if 'criteria' has a value
     *
     * @return bool
     */
    public function hasCriteria()
    {
        return $this->criteria !== null;
    }

    /**
     * Get 'criteria' value
     *
     * @return \Mysqlx\Expr\Expr
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Set 'criteria' value
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function setCriteria(\Kambo\Database\Protocolx\Client\Mysqlx\Expr\Expr $value = null)
    {
        $this->criteria = $value;
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
     * @return \Protobuf\Collection<\Mysqlx\Datatypes\Scalar>
     */
    public function getArgsList()
    {
        return $this->args;
    }

    /**
     * Set 'args' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Datatypes\Scalar> $value
     */
    public function setArgsList(\Protobuf\Collection $value = null)
    {
        $this->args = $value;
    }

    /**
     * Add a new element to 'args'
     *
     * @param \Mysqlx\Datatypes\Scalar $value
     */
    public function addArgs(\Mysqlx\Datatypes\Scalar $value)
    {
        if ($this->args === null) {
            $this->args = new \Protobuf\MessageCollection();
        }

        $this->args->add($value);
    }

    /**
     * Check if 'limit' has a value
     *
     * @return bool
     */
    public function hasLimit()
    {
        return $this->limit !== null;
    }

    /**
     * Get 'limit' value
     *
     * @return \Mysqlx\Crud\Limit
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set 'limit' value
     *
     * @param \Mysqlx\Crud\Limit $value
     */
    public function setLimit(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\Limit $value = null)
    {
        $this->limit = $value;
    }

    /**
     * Check if 'order' has a value
     *
     * @return bool
     */
    public function hasOrderList()
    {
        return $this->order !== null;
    }

    /**
     * Get 'order' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Crud\Order>
     */
    public function getOrderList()
    {
        return $this->order;
    }

    /**
     * Set 'order' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Crud\Order> $value
     */
    public function setOrderList(\Protobuf\Collection $value = null)
    {
        $this->order = $value;
    }

    /**
     * Add a new element to 'order'
     *
     * @param \Mysqlx\Crud\Order $value
     */
    public function addOrder(\Kambo\Database\Protocolx\Client\Mysqlx\Crud\Order $value)
    {
        if ($this->order === null) {
            $this->order = new \Protobuf\MessageCollection();
        }

        $this->order->add($value);
    }

    /**
     * Check if 'grouping' has a value
     *
     * @return bool
     */
    public function hasGroupingList()
    {
        return $this->grouping !== null;
    }

    /**
     * Get 'grouping' value
     *
     * @return \Protobuf\Collection<\Mysqlx\Expr\Expr>
     */
    public function getGroupingList()
    {
        return $this->grouping;
    }

    /**
     * Set 'grouping' value
     *
     * @param \Protobuf\Collection<\Mysqlx\Expr\Expr> $value
     */
    public function setGroupingList(\Protobuf\Collection $value = null)
    {
        $this->grouping = $value;
    }

    /**
     * Add a new element to 'grouping'
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function addGrouping(\Mysqlx\Expr\Expr $value)
    {
        if ($this->grouping === null) {
            $this->grouping = new \Protobuf\MessageCollection();
        }

        $this->grouping->add($value);
    }

    /**
     * Check if 'grouping_criteria' has a value
     *
     * @return bool
     */
    public function hasGroupingCriteria()
    {
        return $this->grouping_criteria !== null;
    }

    /**
     * Get 'grouping_criteria' value
     *
     * @return \Mysqlx\Expr\Expr
     */
    public function getGroupingCriteria()
    {
        return $this->grouping_criteria;
    }

    /**
     * Set 'grouping_criteria' value
     *
     * @param \Mysqlx\Expr\Expr $value
     */
    public function setGroupingCriteria(\Mysqlx\Expr\Expr $value = null)
    {
        $this->grouping_criteria = $value;
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
        if (! isset($values['collection'])) {
            throw new \InvalidArgumentException('Field "collection" (tag 2) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'data_model' => null,
            'projection' => [],
            'criteria' => null,
            'args' => [],
            'limit' => null,
            'order' => [],
            'grouping' => [],
            'grouping_criteria' => null
        ], $values);

        $message->setCollection($values['collection']);
        $message->setDataModel($values['data_model']);
        $message->setCriteria($values['criteria']);
        $message->setLimit($values['limit']);
        $message->setGroupingCriteria($values['grouping_criteria']);

        foreach ($values['projection'] as $item) {
            $message->addProjection($item);
        }

        foreach ($values['args'] as $item) {
            $message->addArgs($item);
        }

        foreach ($values['order'] as $item) {
            $message->addOrder($item);
        }

        foreach ($values['grouping'] as $item) {
            $message->addGrouping($item);
        }

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Find',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'collection',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Crud.Collection'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'data_model',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Crud.DataModel'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'projection',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Crud.Projection'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 5,
                    'name' => 'criteria',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Expr.Expr'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 11,
                    'name' => 'args',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 6,
                    'name' => 'limit',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Crud.Limit'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 7,
                    'name' => 'order',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Crud.Order'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 8,
                    'name' => 'grouping',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REPEATED(),
                    'type_name' => '.Mysqlx.Expr.Expr'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 9,
                    'name' => 'grouping_criteria',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
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

        if ($this->collection === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Crud\\Find#collection" (tag 2) is required but has no value.');
        }

        if ($this->collection !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeVarint($stream, $this->collection->serializedSize($sizeContext));
            $this->collection->writeTo($context);
        }

        if ($this->data_model !== null) {
            $writer->writeVarint($stream, 24);
            $writer->writeVarint($stream, $this->data_model->value());
        }

        if ($this->projection !== null) {
            foreach ($this->projection as $val) {
                $writer->writeVarint($stream, 34);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->criteria !== null) {
            $writer->writeVarint($stream, 42);
            $writer->writeVarint($stream, $this->criteria->serializedSize($sizeContext));
            $this->criteria->writeTo($context);
        }

        if ($this->args !== null) {
            foreach ($this->args as $val) {
                $writer->writeVarint($stream, 90);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->limit !== null) {
            $writer->writeVarint($stream, 50);
            $writer->writeVarint($stream, $this->limit->serializedSize($sizeContext));
            $this->limit->writeTo($context);
        }

        if ($this->order !== null) {
            foreach ($this->order as $val) {
                $writer->writeVarint($stream, 58);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->grouping !== null) {
            foreach ($this->grouping as $val) {
                $writer->writeVarint($stream, 66);
                $writer->writeVarint($stream, $val->serializedSize($sizeContext));
                $val->writeTo($context);
            }
        }

        if ($this->grouping_criteria !== null) {
            $writer->writeVarint($stream, 74);
            $writer->writeVarint($stream, $this->grouping_criteria->serializedSize($sizeContext));
            $this->grouping_criteria->writeTo($context);
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

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Crud\Collection();

                $this->collection = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 14);

                $this->data_model = \Mysqlx\Crud\DataModel::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Crud\Projection();

                if ($this->projection === null) {
                    $this->projection = new \Protobuf\MessageCollection();
                }

                $this->projection->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 5) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Expr();

                $this->criteria = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 11) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Datatypes\Scalar();

                if ($this->args === null) {
                    $this->args = new \Protobuf\MessageCollection();
                }

                $this->args->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 6) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Crud\Limit();

                $this->limit = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 7) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Crud\Order();

                if ($this->order === null) {
                    $this->order = new \Protobuf\MessageCollection();
                }

                $this->order->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 8) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Expr();

                if ($this->grouping === null) {
                    $this->grouping = new \Protobuf\MessageCollection();
                }

                $this->grouping->add($innerMessage);

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 9) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Mysqlx\Expr\Expr();

                $this->grouping_criteria = $innerMessage;

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

        if ($this->collection !== null) {
            $innerSize = $this->collection->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->data_model !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->data_model->value());
        }

        if ($this->projection !== null) {
            foreach ($this->projection as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->criteria !== null) {
            $innerSize = $this->criteria->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->args !== null) {
            foreach ($this->args as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->limit !== null) {
            $innerSize = $this->limit->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->order !== null) {
            foreach ($this->order as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->grouping !== null) {
            foreach ($this->grouping as $val) {
                $innerSize = $val->serializedSize($context);

                $size += 1;
                $size += $innerSize;
                $size += $calculator->computeVarintSize($innerSize);
            }
        }

        if ($this->grouping_criteria !== null) {
            $innerSize = $this->grouping_criteria->serializedSize($context);

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
        $this->collection = null;
        $this->data_model = null;
        $this->projection = null;
        $this->criteria = null;
        $this->args = null;
        $this->limit = null;
        $this->order = null;
        $this->grouping = null;
        $this->grouping_criteria = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Kambo\Database\Protocolx\Client\Mysqlx\Crud\Find) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->collection = ($message->collection !== null) ? $message->collection : $this->collection;
        $this->data_model = ($message->data_model !== null) ? $message->data_model : $this->data_model;
        $this->projection = ($message->projection !== null) ? $message->projection : $this->projection;
        $this->criteria = ($message->criteria !== null) ? $message->criteria : $this->criteria;
        $this->args = ($message->args !== null) ? $message->args : $this->args;
        $this->limit = ($message->limit !== null) ? $message->limit : $this->limit;
        $this->order = ($message->order !== null) ? $message->order : $this->order;
        $this->grouping = ($message->grouping !== null) ? $message->grouping : $this->grouping;
        $this->grouping_criteria = ($message->grouping_criteria !== null) ? $message->grouping_criteria : $this->grouping_criteria;
    }
}
