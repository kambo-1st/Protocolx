<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Authenticate;

use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateStart;
use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateContinue;
use Kambo\Database\Protocolx\Client\Mysqlx\Session\AuthenticateOk;

/**
 * Unit test for the Authenticate class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class AuthenticateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests start of the Authenticate operation
     *
     * @return void
     */
    public function testStart()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof AuthenticateStart);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(4),
                         $this->callback($callBack)
                     )->will(
                         $this->returnValue(
                             [
                                [
                                    "type" => 3,
                                    "data" => new AuthenticateContinue()
                                ],
                             ]
                         )
                     );

        $authenticateOperation = new Authenticate($mysqlxClient);
        $operationResult       = $authenticateOperation->start('foo');

        $this->assertInstanceOf(AuthenticateContinue::class, $operationResult);
    }

    /**
     * Tests goOn of the Authenticate operation
     *
     * @return void
     */
    public function testGoOn()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof AuthenticateContinue);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(5),
                         $this->callback($callBack)
                     )->will(
                         $this->returnValue(
                             [
                                [
                                    "type" => 4,
                                    "data" => new AuthenticateOk()
                                ],
                             ]
                         )
                     );

        $authenticateOperation = new Authenticate($mysqlxClient);
        $operationResult       = $authenticateOperation->goOn('bar');

        $this->assertInstanceOf(AuthenticateOk::class, $operationResult);
    }
}
