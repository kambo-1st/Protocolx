<?php
namespace Kambo\Database\Protocolx\Client\Mysqlx\Session;

/**
 * Protobuf message : Mysqlx.Session.AuthenticateStart
 *
 * @package Kambo\Database\Protocolx\Client\Mysqlx\Session
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class AuthenticateStart extends \Protobuf\AbstractMessage
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
     * mech_name required string = 1
     *
     * @var string
     */
    protected $mech_name = null;

    /**
     * auth_data optional bytes = 2
     *
     * @var \Protobuf\Stream
     */
    protected $auth_data = null;

    /**
     * initial_response optional bytes = 3
     *
     * @var \Protobuf\Stream
     */
    protected $initial_response = null;

    /**
     * Check if 'mech_name' has a value
     *
     * @return bool
     */
    public function hasMechName()
    {
        return $this->mech_name !== null;
    }

    /**
     * Get 'mech_name' value
     *
     * @return string
     */
    public function getMechName()
    {
        return $this->mech_name;
    }

    /**
     * Set 'mech_name' value
     *
     * @param string $value
     */
    public function setMechName($value)
    {
        $this->mech_name = $value;
    }

    /**
     * Check if 'auth_data' has a value
     *
     * @return bool
     */
    public function hasAuthData()
    {
        return $this->auth_data !== null;
    }

    /**
     * Get 'auth_data' value
     *
     * @return \Protobuf\Stream
     */
    public function getAuthData()
    {
        return $this->auth_data;
    }

    /**
     * Set 'auth_data' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setAuthData($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->auth_data = $value;
    }

    /**
     * Check if 'initial_response' has a value
     *
     * @return bool
     */
    public function hasInitialResponse()
    {
        return $this->initial_response !== null;
    }

    /**
     * Get 'initial_response' value
     *
     * @return \Protobuf\Stream
     */
    public function getInitialResponse()
    {
        return $this->initial_response;
    }

    /**
     * Set 'initial_response' value
     *
     * @param \Protobuf\Stream $value
     */
    public function setInitialResponse($value = null)
    {
        if ($value !== null && ! $value instanceof \Protobuf\Stream) {
            $value = \Protobuf\Stream::wrap($value);
        }

        $this->initial_response = $value;
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
        if (! isset($values['mech_name'])) {
            throw new \InvalidArgumentException(
                'Field "mech_name" (tag 1) is required but has no value.'
            );
        }

        $message = new self();
        $values  = array_merge([
            'auth_data' => null,
            'initial_response' => null
        ], $values);

        $message->setMechName($values['mech_name']);
        $message->setAuthData($values['auth_data']);
        $message->setInitialResponse($values['initial_response']);

        return $message;
    }

    /**
     * {@inheritdoc}
     */
    public static function descriptor()
    {
        return \google\protobuf\DescriptorProto::fromArray([
            'name'      => 'AuthenticateStart',
            'field'     => [
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 1,
                    'name' => 'mech_name',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_STRING(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_REQUIRED()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 2,
                    'name' => 'auth_data',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
                    'label' => \google\protobuf\FieldDescriptorProto\Label::LABEL_OPTIONAL()
                ]),
                \google\protobuf\FieldDescriptorProto::fromArray([
                    'number' => 3,
                    'name' => 'initial_response',
                    'type' => \google\protobuf\FieldDescriptorProto\Type::TYPE_BYTES(),
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

        if ($this->mech_name === null) {
            throw new \UnexpectedValueException(
                'Field "\\Mysqlx\\Session\\AuthenticateStart#mech_name"'
                . ' (tag 1) is required but has no value.'
            );
        }

        if ($this->mech_name !== null) {
            $writer->writeVarint($stream, 10);
            $writer->writeString($stream, $this->mech_name);
        }

        if ($this->auth_data !== null) {
            $writer->writeVarint($stream, 18);
            $writer->writeByteStream($stream, $this->auth_data);
        }

        if ($this->initial_response !== null) {
            $writer->writeVarint($stream, 26);
            $writer->writeByteStream($stream, $this->initial_response);
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
                \Protobuf\WireFormat::assertWireType($wire, 9);

                $this->mech_name = $reader->readString($stream);

                continue;
            }

            if ($tag === 2) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->auth_data = $reader->readByteStream($stream);

                continue;
            }

            if ($tag === 3) {
                \Protobuf\WireFormat::assertWireType($wire, 12);

                $this->initial_response = $reader->readByteStream($stream);

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

        if ($this->mech_name !== null) {
            $size += 1;
            $size += $calculator->computeStringSize($this->mech_name);
        }

        if ($this->auth_data !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->auth_data);
        }

        if ($this->initial_response !== null) {
            $size += 1;
            $size += $calculator->computeByteStreamSize($this->initial_response);
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
        $this->mech_name = null;
        $this->auth_data = null;
        $this->initial_response = null;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Protobuf\Message $message)
    {
        if (! $message instanceof \Mysqlx\Session\AuthenticateStart) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Argument 1 passed to %s must be a %s, %s given',
                    __METHOD__,
                    __CLASS__,
                    get_class($message)
                )
            );
        }

        $this->mech_name = ($message->mech_name !== null) ? $message->mech_name
                                                          : $this->mech_name;
        $this->auth_data = ($message->auth_data !== null) ? $message->auth_data
                                                          : $this->auth_data;
        $this->initial_response = ($message->initial_response !== null)
            ? $message->initial_response
            : $this->initial_response;
    }
}
