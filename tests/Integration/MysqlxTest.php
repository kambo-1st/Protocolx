<?php
namespace Kambo\Tests\Database\Protocolx\Integration;

use Kambo\Tests\Database\Protocolx\Persistence\DatabaseTestCase;

use Kambo\Database\Protocolx\Mysqlx;
use Kambo\Database\Protocolx\NodeSession;
use Kambo\Database\Protocolx\Adapter\Protocolx;

/**
 * Integration test for the Mysqlx object.
 *
 * @package Kambo\Tests\Database\Protocolx\Integration
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class MysqlxTest extends DatabaseTestCase
{
    /**
     * testGetSession
     *
     * @return void
     */
    public function testGetNodeSession()
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => $connectionConfig['user'],
            'dbPassword' => $connectionConfig['password']
        ];

        $mysqlx  = new Mysqlx(new Protocolx());
        $session = $mysqlx->getNodeSession($sessionParameters);

        $this->assertInstanceOf(NodeSession::class, $session);
    }

    /**
     * testGetSessionInvalidUser
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testGetNodeSessionInvalidUser()
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => 'nonexistinguser',
            'dbPassword' => $connectionConfig['password']
        ];

        $mysqlx = new Mysqlx(new Protocolx());
        $mysqlx->getNodeSession($sessionParameters);
    }

    /**
     * testGetNodeSessionInvalidMethod
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\DriverException
     */
    public function testGetNodeSessionInvalidAuthMethod()
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => $connectionConfig['user'],
            'dbPassword' => $connectionConfig['password'],
            'authMethod' => 'non existing auth method'
        ];

        $mysqlx = new Mysqlx(new Protocolx());
        $mysqlx->getNodeSession($sessionParameters);
    }
}
