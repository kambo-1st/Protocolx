<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Datatypes;

/**
 * Protobuf message : Mysqlx.Datatypes.Scalar
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Datatypes
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Scalar extends \Protobuf\AbstractMessage
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
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type
     */
    protected $type = null;

    /**
     * v_signed_int optional sint64 = 2
     *
     * @var int
     */
    protected $v_signed_int = null;

    /**
     * v_unsigned_int optional uint64 = 3
     *
     * @var int
     */
    protected $v_unsigned_int = null;

    /**
     * v_octets optional message = 5
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Octets
     */
    protected $v_octets = null;

    /**
     * v_double optional double = 6
     *
     * @var float
     */
    protected $v_double = null;

    /**
     * v_float optional float = 7
     *
     * @var float
     */
    protected $v_float = null;

    /**
     * v_bool optional bool = 8
     *
     * @var bool
     */
    protected $v_bool = null;

    /**
     * v_string optional message = 9
     *
     * @var \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String
     */
    protected $v_string = null;

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
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set 'type' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type $value
     */
    public function setType(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type $value)
    {
        $this->type = $value;
    }

    /**
     * Check if 'v_signed_int' has a value
     *
     * @return bool
     */
    public function hasVSignedInt()
    {
        return $this->v_signed_int !== null;
    }

    /**
     * Get 'v_signed_int' value
     *
     * @return int
     */
    public function getVSignedInt()
    {
        return $this->v_signed_int;
    }

    /**
     * Set 'v_signed_int' value
     *
     * @param int $value
     */
    public function setVSignedInt($value = null)
    {
        $this->v_signed_int = $value;
    }

    /**
     * Check if 'v_unsigned_int' has a value
     *
     * @return bool
     */
    public function hasVUnsignedInt()
    {
        return $this->v_unsigned_int !== null;
    }

    /**
     * Get 'v_unsigned_int' value
     *
     * @return int
     */
    public function getVUnsignedInt()
    {
        return $this->v_unsigned_int;
    }

    /**
     * Set 'v_unsigned_int' value
     *
     * @param int $value
     */
    public function setVUnsignedInt($value = null)
    {
        $this->v_unsigned_int = $value;
    }

    /**
     * Check if 'v_octets' has a value
     *
     * @return bool
     */
    public function hasVOctets()
    {
        return $this->v_octets !== null;
    }

    /**
     * Get 'v_octets' value
     *
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Octets
     */
    public function getVOctets()
    {
        return $this->v_octets;
    }

    /**
     * Set 'v_octets' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Octets $value
     */
    public function setVOctets(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Octets $value = null)
    {
        $this->v_octets = $value;
    }

    /**
     * Check if 'v_double' has a value
     *
     * @return bool
     */
    public function hasVDouble()
    {
        return $this->v_double !== null;
    }

    /**
     * Get 'v_double' value
     *
     * @return float
     */
    public function getVDouble()
    {
        return $this->v_double;
    }

    /**
     * Set 'v_double' value
     *
     * @param float $value
     */
    public function setVDouble($value = null)
    {
        $this->v_double = $value;
    }

    /**
     * Check if 'v_float' has a value
     *
     * @return bool
     */
    public function hasVFloat()
    {
        return $this->v_float !== null;
    }

    /**
     * Get 'v_float' value
     *
     * @return float
     */
    public function getVFloat()
    {
        return $this->v_float;
    }

    /**
     * Set 'v_float' value
     *
     * @param float $value
     */
    public function setVFloat($value = null)
    {
        $this->v_float = $value;
    }

    /**
     * Check if 'v_bool' has a value
     *
     * @return bool
     */
    public function hasVBool()
    {
        return $this->v_bool !== null;
    }

    /**
     * Get 'v_bool' value
     *
     * @return bool
     */
    public function getVBool()
    {
        return $this->v_bool;
    }

    /**
     * Set 'v_bool' value
     *
     * @param bool $value
     */
    public function setVBool($value = null)
    {
        $this->v_bool = $value;
    }

    /**
     * Check if 'v_string' has a value
     *
     * @return bool
     */
    public function hasVString()
    {
        return $this->v_string !== null;
    }

    /**
     * Get 'v_string' value
     *
     * @return \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String
     */
    public function getVString()
    {
        return $this->v_string;
    }

    /**
     * Set 'v_string' value
     *
     * @param \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String $value
     */
    public function setVString(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String $value = null)
    {
        $this->v_string = $value;
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
            'v_signed_int' => null,
            'v_unsigned_int' => null,
            'v_octets' => null,
            'v_double' => null,
            'v_float' => null,
            'v_bool' => null,
            'v_string' => null
        ], $values);

        $message->setType($values['type']);
        $message->setVSignedInt($values['v_signed_int']);
        $message->setVUnsignedInt($values['v_unsigned_int']);
        $message->setVOctets($values['v_octets']);
        $message->setVDouble($values['v_double']);
        $message->setVFloat($values['v_float']);
        $message->setVBool($values['v_bool']);
        $message->setVString($values['v_string']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'Scalar',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'type',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_ENUM(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar.Type'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'v_signed_int',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_SINT64(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'v_unsigned_int',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_UINT64(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 5,
                    'name' => 'v_octets',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar.Octets'
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 6,
                    'name' => 'v_double',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_DOUBLE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 7,
                    'name' => 'v_float',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_FLOAT(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 8,
                    'name' => 'v_bool',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BOOL(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 9,
                    'name' => 'v_string',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_MESSAGE(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL(),
                    'type_name' => '.Mysqlx.Datatypes.Scalar.String'
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
            throw new \UnexpectedValueException('Field "\\Mysqlx\\Datatypes\\Scalar#type" (tag 1) is required but has no value.');
        }

        if ($this->type !== null) {
            $writer->writeVarint($stream, 8);
            $writer->writeVarint($stream, $this->type->value());
        }

        if ($this->v_signed_int !== null) {
            $writer->writeVarint($stream, 16);
            $writer->writeZigzag64($stream, $this->v_signed_int);
        }

        if ($this->v_unsigned_int !== null) {
            $writer->writeVarint($stream, 24);
            $writer->writeVarint($stream, $this->v_unsigned_int);
        }

        if ($this->v_octets !== null) {
            $writer->writeVarint($stream, 42);
            $writer->writeVarint($stream, $this->v_octets->serializedSize($sizeContext));
            $this->v_octets->writeTo($context);
        }

        if ($this->v_double !== null) {
            $writer->writeVarint($stream, 49);
            $writer->writeDouble($stream, $this->v_double);
        }

        if ($this->v_float !== null) {
            $writer->writeVarint($stream, 61);
            $writer->writeFloat($stream, $this->v_float);
        }

        if ($this->v_bool !== null) {
            $writer->writeVarint($stream, 64);
            $writer->writeBool($stream, $this->v_bool);
        }

        if ($this->v_string !== null) {
            $writer->writeVarint($stream, 74);
            $writer->writeVarint($stream, $this->v_string->serializedSize($sizeContext));
            $this->v_string->writeTo($context);
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

                $this->type = \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type::valueOf($reader->readVarint($stream));

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 18);

                $this->v_signed_int = $reader->readZigzag($stream);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 4);

                $this->v_unsigned_int = $reader->readVarint($stream);

                continue;
            }

            if ($tag === 5) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Octets();

                $this->v_octets = $innerMessage;

                $context->setLength($innerSize);
                $innerMessage->readFrom($context);
                $context->setLength($length);

                continue;
            }

            if ($tag === 6) {
                \Protobuf\WireFormat::assertWireType($wire, 1);

                $this->v_double = $reader->readDouble($stream);

                continue;
            }

            if ($tag === 7) {
                \Protobuf\WireFormat::assertWireType($wire, 2);

                $this->v_float = $reader->readFloat($stream);

                continue;
            }

            if ($tag === 8) {
                \Protobuf\WireFormat::assertWireType($wire, 8);

                $this->v_bool = $reader->readBool($stream);

                continue;
            }

            if ($tag === 9) {
                \Protobuf\WireFormat::assertWireType($wire, 11);

                $innerSize    = $reader->readVarint($stream);
                $innerMessage = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String();

                $this->v_string = $innerMessage;

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

        if ($this->type !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->type->value());
        }

        if ($this->v_signed_int !== null) {
            $size += 1;
            $size += $calculator->computeZigzag64Size($this->v_signed_int);
        }

        if ($this->v_unsigned_int !== null) {
            $size += 1;
            $size += $calculator->computeVarintSize($this->v_unsigned_int);
        }

        if ($this->v_octets !== null) {
            $innerSize = $this->v_octets->serializedSize($context);

            $size += 1;
            $size += $innerSize;
            $size += $calculator->computeVarintSize($innerSize);
        }

        if ($this->v_double !== null) {
            $size += 1;
            $size += 8;
        }

        if ($this->v_float !== null) {
            $size += 1;
            $size += 4;
        }

        if ($this->v_bool !== null) {
            $size += 1;
            $size += 1;
        }

        if ($this->v_string !== null) {
            $innerSize = $this->v_string->serializedSize($context);

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
        $this->type = null;
        $this->v_signed_int = null;
        $this->v_unsigned_int = null;
        $this->v_octets = null;
        $this->v_double = null;
        $this->v_float = null;
        $this->v_bool = null;
        $this->v_string = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar) {
            throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be a %s, %s given', __METHOD__, __CLASS__, get_class($message)));
        }

        $this->type = ($message->type !== null) ? $message->type : $this->type;
        $this->v_signed_int = ($message->v_signed_int !== null) ? $message->v_signed_int : $this->v_signed_int;
        $this->v_unsigned_int = ($message->v_unsigned_int !== null) ? $message->v_unsigned_int : $this->v_unsigned_int;
        $this->v_octets = ($message->v_octets !== null) ? $message->v_octets : $this->v_octets;
        $this->v_double = ($message->v_double !== null) ? $message->v_double : $this->v_double;
        $this->v_float = ($message->v_float !== null) ? $message->v_float : $this->v_float;
        $this->v_bool = ($message->v_bool !== null) ? $message->v_bool : $this->v_bool;
        $this->v_string = ($message->v_string !== null) ? $message->v_string : $this->v_string;
    }
}
