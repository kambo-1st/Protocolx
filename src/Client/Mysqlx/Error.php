<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx;

/**
 * Protobuf message : Mysqlx.Error
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Error extends \Protobuf\AbstractMessage
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
     * severity optional enum = 1
     *
     * @var \Mysqlx\Error\Severity
     */
    protected $severity = null;

    /**
     * code required uint32 = 2
     *
     * @var int
     */
    protected $code = null;

    /**
     * sql_state required string = 4
     *
     * @var string
     */
    protected $sql_state = null;

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
        $this->severity = \Kambo\Database\Protocolx\Client\Mysqlx\Error\Severity::ERROR();

        parent::__construct($stream, $configuration);
    }

    /**
     * Check if 'severity' has a value
     *
     * @return bool
     */
    public function hasSeverity()
    {
        return $this->severity !== null;
    }

    /**
     * Get 'severity' value
     *
     * @return \Mysqlx\Error\Severity
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * Set 'severity' value
     *
     * @param \Mysqlx\Error\Severity $value
     */
    public function setSeverity(\Kambo\Database\Protocolx\Client\Mysqlx\Error\Severity $value = null)
    {
        $this->severity = $value;
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
     * Check if 'sql_state' has a value
     *
     * @return bool
     */
    public function hasSqlState()
    {
        return $this->sql_state !== null;
    }

    /**
     * Get 'sql_state' value
     *
     * @return string
     */
    public function getSqlState()
    {
        return $this->sql_state;
    }

    /**
     * Set 'sql_state' value
     *
     * @param string $value
     */
    public function setSqlState($value)
    {
        $this->sql_state = $value;
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

        if (! isset($values['sql_state'])) {
            throw new \InvalidArgumentException('Field "sql_state" (tag 4) is required but has no value.');
        }

        if (! isset($values['msg'])) {
            throw new \InvalidArgumentException('Field "msg" (tag 3) is required but has no value.');
        }

        $message = new self();
        $values  = array_merge([
            'severity' => \Kambo\Database\Protocolx\Client\Mysqlx\Error\Severity::ERROR(),
        ], $values);

        $message->setSeverity($values['severity']);
        $message->setCode($values['code']);
        $message->setSqlState($values['sql_state']);
        $message->setMsg($values['msg']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Error',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'severity',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Error.Severity',
                    'default_value' => \Mysqlx\Error\Severity::ERROR()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'code',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT32(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 4,
                    'name' => 'sql_state',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
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
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Error#code" (tag 2) is required but has no value.');
        }

        if ($this->sql_state === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Error#sql_state" (tag 4) is required but has no value.');
        }

        if ($this->msg === null) {
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Error#msg" (tag 3) is required but has no value.');
        }

        if ($this->severity !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->severity->value());
        }

        if ($this->code !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeVarint($stream, $this->code);
        }

        if ($this->sql_state !== null) {
            $writer->writeVarint($stream, 34);
            $writer->writeString($stream, $this->sql_state);
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

                $this->severity = \Kambo\Database\Protocolx\Client\Mysqlx\Error\Severity::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 13);

                $this->code = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 4) {
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->sql_state = $reader->readString($stream);

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

        if ($this->severity !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->severity->value());
        }

        if ($this->code !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->code);
        }

        if ($this->sql_state !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->sql_state);
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
        $this->severity = \Mysqlx\Error\Severity::ERROR();
        $this->code = null;
        $this->sql_state = null;
        $this->msg = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Error) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->severity = ($message->severity !== null) ? $message->severity : $this->severity;
        $this->code = ($message->code !== null) ? $message->code : $this->code;
        $this->sql_state = ($message->sql_state !== null) ? $message->sql_state : $this->sql_state;
        $this->msg = ($message->msg !== null) ? $message->msg : $this->msg;
    }
}
