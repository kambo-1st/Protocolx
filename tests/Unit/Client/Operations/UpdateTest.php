<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Client;
use Kambo\Database\Protocolx\Client\Operations\Update;
use Kambo\Database\Protocolx\Client\Result\Metadata;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Update as CrudUpdate;
use Kambo\Database\Protocolx\Client\Mysqlx\Sql\StmtExecuteOk;
use Kambo\Database\Protocolx\Client\Mysqlx\Crud\Limit;

/**
 * Unit test for the Update class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class UpdateTest extends \PHPUnit_Framework_TestCase
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
            return ($sendedInstance instanceof CrudUpdate)
                && ($sendedInstance->getLimit() instanceof Limit)
                && ($sendedInstance->getCriteria() === null);
        };

        $mysqlxClient->expects($this->once())
                     ->method('sendRequest')
                     ->with(
                         $this->equalTo(19),
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

        $updateOperation = new Update($mysqlxClient);
        $operationResult = $updateOperation->execute(
            'testSchema',
            'testCollection',
            [],
            [
                [
                    'itemSet',
                    '$',
                    'value'
                ]
            ],
            [
                'count' => 10
            ]
        );

        $this->assertInstanceOf(Metadata::class, $operationResult);
    }
}
