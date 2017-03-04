<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Notice;

/**
 * Protobuf message : Mysqlx.Notice.Warning
 *
 * @package Mysqlx\Notice
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Warning extends \Protobuf\AbstractMessage
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
     * level optional enum = 1
     *
     * @var \Mysqlx\Notice\Warning\Level
     */
    protected $level = null;

    /**
     * code required uint32 = 2
     *
     * @var int
     */
    protected $code = null;

    /**
     * msg required string = 3
     *
     * @var string
     */
    protected $msg = null;

    /**
     * {@inheritdoc}
     */
    public function __construct($stream = null, \Protobuf\Configuration $configuration = null)
    {
        $this->level = \Mysqlx\Notice\Warning\Level::WARNING();

        parent::__construct($stream, $configuration);
    }

    /**
     * Check if 'level' has a value
     *
     * @return bool
     */
    public function hasLevel()
    {
        return $this->level !== null;
    }

    /**
     * Get 'level' value
     *
     * @return \Mysqlx\Notice\Warning\Level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set 'level' value
     *
     * @param \Mysqlx\Notice\Warning\Level $value
     */
    public function setLevel(\Mysqlx\Notice\Warning\Level $value = null)
    {
        $this->level = $value;
    }

    /**
     * Check if 'code' has a value
     *
     * @return bool
     */
    public function hasCode()
    {
        return $this->code !== null;
    }

    /**
     * Get 'code' value
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set 'code' value
     *
     * @param int $value
     */
    public function setCode($value)
    {
        $this->code = $value;
    }

    /**
     * Check if 'msg' has a value
     *
     * @return bool
     */
    public function hasMsg()
    {
        return $this->msg !== null;
    }

    /**
     * Get 'msg' value
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set 'msg' value
     *
     * @param string $value
     */
    public function setMsg($value)
    {
        $this->msg = $value;
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
        if (! isset($values['code'])) {
            throw new \InvalidArgumentException('Field "code" (tag 2) is required but has no value.');
        }

        if (! isset($values['msg'])) {
            throw new \InvalidArgumentException('Field "msg" (tag 3) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'level' => \Mysqlx\Notice\Warning\Level::WARNING(),
        ], $values);

        $message->setLevel($values['level']);
        $message->setCode($values['code']);
        $message->setMsg($values['msg']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Warning',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'level',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Notice.Warning.Level',
                    'default_value' => \Mysqlx\Notice\Warning\Level::WARNING()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'code',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'msg',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
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

        if ($this->code === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Notice\\Warning#code" (tag 2) is required but has no value.');
        }

        if ($this->msg === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Notice\\Warning#msg" (tag 3) is required but has no value.');
        }

        if ($this->level !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->level->value());
        }

        if ($this->code !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->code);
        }

        if ($this->msg !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeString($stream, $this->msg);
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

                $this->level = \Mysqlx\Notice\Warning\Level::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->code = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->msg = $reader->readString($stream);

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

        if ($this->level !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->level->value());
        }

        if ($this->code !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->code);
        }

        if ($this->msg !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->msg);
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
        $this->level = \Mysqlx\Notice\Warning\Level::WARNING();
        $this->code = null;
        $this->msg = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Notice\Warning) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->level = ($message->level !== null) ? $message->level : $this->level;
        $this->code = ($message->code !== null) ? $message->code : $this->code;
        $this->msg = ($message->msg !== null) ? $message->msg : $this->msg;
    }
}
