<?php

namespace Kambo\Database\Protocolx\Client\Operations;

use Kambo\Database\Protocolx\Client\Operations\BaseOperation;
use Kambo\Database\Protocolx\Client\Operations\ResponseTrait;

use Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages\Type as ServerMessage;
use Kambo\Database\Protocolx\Client\Mysqlx\ClientMessages\Type as ClientMessage;

use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateStart;
use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateContinue;

/**
 * Authenticate operation on protocolx
 *
 * @package Kambo\Database\Protocolx\Client\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Authenticate extends BaseOperation
{
    use ResponseTrait;

    public function start($mechanism = null)
    {
        $authenticateStart = new AuthenticateStart();
        $authenticateStart->setMechName($mechanism);

        $parsedMessages = $this->sendRequest(
            ClientMessage::SESS_AUTHENTICATE_START_VALUE,
            $authenticateStart
        );

        return $this->getResponseObjectByType(
            ServerMessage::SESS_AUTHENTICATE_CONTINUE_VALUE,
            $parsedMessages
        );
    }

    public function goOn($authData)
    {
        $authenticateContinue = new AuthenticateContinue();
        $authenticateContinue->setAuthData($authData);

        $parsedMessages = $this->sendRequest(
            ClientMessage::SESS_AUTHENTICATE_CONTINUE_VALUE,
            $authenticateContinue
        );

        return $this->getResponseObjectByType(
            ServerMessage::SESS_AUTHENTICATE_OK_VALUE,
            $parsedMessages
        );
    }
}
