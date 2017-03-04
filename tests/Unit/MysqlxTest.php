<?php
namespace Kambo\Tests\Database\Protocolx\Unit;

use Kambo\Database\Protocolx\Mysqlx;
use Kambo\Database\Protocolx\NodeSession;
use Kambo\Database\Protocolx\Adapter\Protocolx;

/**
 * Unit test for the Mysqlx class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class MysqlxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests if the method getNodeSession return instance of NodeSession
     *
     * @return void
     */
    public function testGetNodeSession()
    {
        $sessionParameters = [
            'host' => 'hostname',
            'port' => 33060,
            'dbUser' => 'user',
            'dbPassword' => 'password',
            'authMethod' => 'MYSQL41'
        ];

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('connect')
                     ->with($this->equalTo($sessionParameters));

        $mysqlx  = new Mysqlx($protocolMock);
        $session = $mysqlx->getNodeSession($sessionParameters);

        $this->assertInstanceOf(NodeSession::class, $session);
    }

    /**
     * Tests if class set proper defualt values
     *
     * @return void
     */
    public function testGetNodeSessionDefualtValues()
    {
        $sessionParameters = [
            'dbUser' => 'user',
            'dbPassword' => 'password'
        ];

        $sessionParametersExpected = [
            'dbUser' => 'user',
            'dbPassword' => 'password',
            'port' => 33060,
            'host' => 'localhost',
            'authMethod' => 'MYSQL41'
        ];

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('connect')
                     ->with($this->equalTo($sessionParametersExpected));

        $mysqlx  = new Mysqlx($protocolMock);
        $session = $mysqlx->getNodeSession($sessionParameters);

        $this->assertInstanceOf(NodeSession::class, $session);
    }
}
