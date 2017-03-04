<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Statement;
use Kambo\Database\Protocolx\Client\Result\DataResult;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecute;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;

/**
 * Unit test for the Statement class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class StatementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the Statement operation
     *
     * @return void
     */
    public function testExecute()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof StmtExecute)
                 && ($sendedInstance->getStmt() == 'SELECT * FROM foo;')
                 && ($sendedInstance->getNamespace() == 'sql');
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(12),
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

        $statement       = new Statement($mysqlxClient);
        $operationResult = $statement->execute('SELECT * FROM foo;');

        $this->assertInstanceOf(DataResult::class, $operationResult);
    }
}
