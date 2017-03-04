<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Delete;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Delete as CrudDelete;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;
use Kambo\Database\Protocolx\Client\Result\Metadata;

/**
 * Unit test for the Delete class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the Delete operation
     *
     * @return void
     */
    public function testExecute()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof CrudDelete);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(20),
                         $this->callback($callBack)
                     )->will(
                         $this->returnValue(
                             [
                                [
                                    "type" => 17,
                                    "data" => new StmtExecuteOk()
                                ],
                             ]
                         )
                     );

        $deleteOperation = new Delete($mysqlxClient);
        $operationResult = $deleteOperation->execute(
            'testSchema',
            'testCollection',
            []
        );

        $this->assertInstanceOf(Metadata::class, $operationResult);
    }
}
