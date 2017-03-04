<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Collection;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Result\Result;
use Kambo\Database\Protocolx\Collection\Remove;

/**
 * Unit test for the Remove class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class RemoveTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the remove operation
     *
     * @return void
     */
    public function testExecute()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudRemove')
                     ->with(
                         $this->equalTo(
                             'test_schema'
                         ),
                         $this->equalTo(
                             'test_collection'
                         ),
                         $this->equalTo(
                             []
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $removeOperation = new Remove(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $operationResult = $removeOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }

    /**
     * Tests setting limit for remove operation
     *
     * @return void
     */
    public function testLimit()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudRemove')
                     ->with(
                         $this->equalTo(
                             'test_schema'
                         ),
                         $this->equalTo(
                             'test_collection'
                         ),
                         $this->equalTo(
                             []
                         ),
                         $this->equalTo(
                             [
                                'count' => 10
                             ]
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $removeOperation = new Remove(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $removeOperation->limit(10);
        $operationResult = $removeOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }
}
