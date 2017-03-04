<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Collection;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Result\DocResult;
use Kambo\Database\Protocolx\Collection\Find;

/**
 * Unit test for the Find class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Collection
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class FindTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests execution of the find operation
     *
     * @return void
     */
    public function testExecute()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();
        $sqlResultMock = $this->getMockBuilder(DocResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $protocolMock->expects($this->once())
                     ->method('crudFind')
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
                         ),
                         $this->equalTo(
                             null
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $findOperation = new Find(
            $protocolMock,
            'test_schema',
            'test_collection',
            []
        );

        $operationResult = $findOperation->execute();

        $this->assertInstanceOf(DocResult::class, $operationResult);
    }
}
