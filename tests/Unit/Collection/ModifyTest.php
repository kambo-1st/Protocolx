<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Collection;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Result\Result;
use Kambo\Database\Protocolx\Collection\Modify;

/**
 * Unit test for the Modify class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class ModifyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the Modify operation
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
                     ->method('crudModify')
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
                             []
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $modifyOperation = new Modify(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $operationResult = $modifyOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }

    /**
     * Tests setting item into documents
     *
     * @return void
     */
    public function testSetItemExecute()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudModify')
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
                                [
                                    'itemSet',
                                    'foo',
                                    'bar',
                                ],
                             ]
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $modifyOperation = new Modify(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $modifyOperation->setItem('foo', 'bar');
        $operationResult = $modifyOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }

    /**
     * Tests unsetting item in documents
     *
     * @return void
     */
    public function testUnsetItemExecute()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudModify')
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
                                [
                                    'itemUnset',
                                    'foo',
                                    null,
                                ],
                             ]
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $modifyOperation = new Modify(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $modifyOperation->unsetItem('foo', 'bar');
        $operationResult = $modifyOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }

    /**
     * Tests array append item
     *
     * @return void
     */
    public function testArrayAppendExecute()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudModify')
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
                                [
                                    'arrayAppend',
                                    'foo',
                                    ['bar'],
                                ],
                             ]
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $modifyOperation = new Modify(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $modifyOperation->arrayAppend('foo', ['bar']);
        $operationResult = $modifyOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }

    /**
     * Tests limit operation
     *
     * @return void
     */
    public function testLimitExecute()
    {
        $protocolMock  = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(Result::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudModify')
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

        $modifyOperation = new Modify(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $modifyOperation->limit(10);
        $operationResult = $modifyOperation->execute();

        $this->assertInstanceOf(Result::class, $operationResult);
    }
}
