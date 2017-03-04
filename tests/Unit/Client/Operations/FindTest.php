<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Find;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Find as CrudFind;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;
use Kambo\Database\Protocolx\Client\Result\DataResult;

/**
 * Unit test for the Find class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class FindTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the Find operation
     *
     * @return void
     */
    public function testExecute()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof CrudFind);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(17),
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

        $findOperation   = new Find($mysqlxClient);
        $operationResult = $findOperation->execute(
            'testSchema',
            'testCollection'
        );

        $this->assertInstanceOf(DataResult::class, $operationResult);
    }
}
