<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Capabilities;
use Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capabilities as MysqlxCapabilities;
use Kambo\Database\Protocolx\Client\Mysqlx\Connection\CapabilitiesGet;
use Kambo\Database\Protocolx\Client\Mysqlx\Connection\Capability;

/**
 * Unit test for the Capabilities class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class CapabilitiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests get method of the Capabilities operation
     *
     * @return void
     */
    public function testGet()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof CapabilitiesGet);
        };

        $stringValue = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\String();
        $stringValue->setValue('bar');
        $scalar = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar();
        $scalar->setVString($stringValue);
        $scalar->setType(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Scalar\Type::V_STRING());

        $anyValue = new \Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any();
        $anyValue->setType(\Kambo\Database\Protocolx\Client\Mysqlx\Datatypes\Any\Type::SCALAR());
        $anyValue->setScalar($scalar);


        $capability = new Capability();
        $capability->setValue($anyValue);
        $capability->setName('foo');

        $mysqlxCapabilities = new MysqlxCapabilities();
        $mysqlxCapabilities->addCapabilities($capability);

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(1),
                         $this->callback($callBack)
                     )->will(
                         $this->returnValue(
                             [
                                [
                                    "type" => 2,
                                    "data" => $mysqlxCapabilities
                                ],
                             ]
                         )
                     );

        $capabilitiesOperation = new Capabilities($mysqlxClient);
        $serverCapabilities    = $capabilitiesOperation->get();

        $this->assertInternalType("array", $serverCapabilities);
        $this->assertEquals(['foo'=>'bar'], $serverCapabilities);
    }
}
