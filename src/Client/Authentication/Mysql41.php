<?php

namespace Kambo\Database\Protocolx\Client\Authentication;

use Kambo\Database\Protocolx\Client\Operations\Authenticate;

/**
 * MySQL 4.1 Authentication handler
 *
 * MYSQL41 authentication is:
 * - supported by MySQL 4.1 and later
 * - a challenge/response protocol using SHA1
 * - similar to CRAM-MD5 ( RFC 2195)
 *
 * @package Kambo\Database\Protocolx\Client\Authentication
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Mysql41
{
    /**
     * ProtocolX transport client.
     *
     * @var \Kambo\Database\Protocolx\Client\Client
     */
    private $client;

    /**
     * Creates instance of MySQL 4.1 Authentication handler
     *
     * @param \Kambo\Database\Protocolx\Client\Client $client ProtocolX transport client.
     */
    public function __construct(
        $client
    ) {
        $this->client = $client;
    }

    /**
     * Authentificate user by given username and password.
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return void
     */
    public function authentificate($username, $password)
    {
        $authenticate = new Authenticate($this->client);

        $authContinue = $authenticate->start('MYSQL41');
        $authData     = $this->getAuthData(
            $authContinue->getAuthData(),
            $password,
            $username
        );

        $authenticate->goOn($authData);
    }

    // ------------ PRIVATE METHODS

    /**
     * Generate MYSQL41 authentification data. Following procedure is used for
     * generating hash: HEX(SHA1(password) ^ SHA1(challenge + SHA1(SHA1(password))))
     *
     * @param string $chalenge Chalenge from the server
     * @param string $password Password
     * @param string $username Username
     *
     * @return string
     */
    private function getAuthData($chalenge, $password, $username)
    {
        $packedUserName = pack('h', 0).$username.pack('h', 0).'*';

        $hashedPassword = sha1(sha1($password, true), true);
        $hashedPassData = sha1($chalenge.$hashedPassword, true);
        $rehashedAuth   = bin2hex(sha1($password, true) ^ $hashedPassData);

        return $packedUserName.strToUpper($rehashedAuth);
    }
}
