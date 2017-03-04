<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Collection;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Result\Result;
use Kambo\Database\Protocolx\Collection\Add;

/**
 * Unit test for the Add class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class AddTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the add operation
     *
     * @return void
     */
    public function testExecute()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudInsert')
                     ->with(
                         $this->equalTo(
                             'test_schema'
                         ),
                         $this->equalTo(
                             'test_collection'
                         ),
                         $this->equalTo(
                             null
                         ),
                         $this->equalTo(
                             [
                                [
                                    'field'=>'data'
                                ]
                             ]
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $addOperation = new Add(
            $protocolMock,
            'test_schema',
            'test_collection',
            [
                [
                    'field'=>'data'
                ]
            ]
        );

        $operationResult = $addOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }
}
