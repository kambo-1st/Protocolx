<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Insert;
use Kambo\Database\Protocolx\Client\Result\Metadata;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Insert as CrudInsert;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;

/**
 * Unit test for the Insert class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class InsertTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the Update operation
     *
     * @return void
     */
    public function testExecute()
    {
        $mysqlxClient = $this->getMockBuilder(Client::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $callBack = function ($sendedInstance) {
            return ($sendedInstance instanceof CrudInsert);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(18),
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

        $insertedDocuments = [
            [
                "new" => [
                    "foo" => "bar"
                ]
            ],
            [
                "other" => [
                    "foo" => "bar"
                ]
            ]
        ];

        $insertOperation = new Insert($mysqlxClient);
        $operationResult = $insertOperation->execute(
            'testSchema',
            'testCollection',
            null,
            $insertedDocuments,
            null
        );

        $this->assertInstanceOf(Metadata::class, $operationResult);
    }
}
