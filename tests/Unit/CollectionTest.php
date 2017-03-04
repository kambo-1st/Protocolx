<?php
namespace Kambo\Tests\Database\Protocolx\Unit;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Collection;
use Kambo\Database\Protocolx\Schema;
use Kambo\Database\Protocolx\Result\SqlResult;

use Kambo\Database\Protocolx\Collection\Find;
use Kambo\Database\Protocolx\Collection\Add;
use Kambo\Database\Protocolx\Collection\Modify;
use Kambo\Database\Protocolx\Collection\Remove;

/**
 * Unit test for the Collection class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests geting name of the collection
     *
     * @return void
     */
    public function testGetName()
    {
        $collection = $this->getMockedCollection();
        $this->assertEquals('test_collection', $collection->getName());
    }

    /**
     * Tests if the collection exists in the database
     *
     * @return void
     */
    public function testExistsInDatabase()
    {
        $schemaMock = $this->getMockBuilder(Schema::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will(
                          $this->returnValue(
                              [
                                [
                                    'field'=>'existing_collection'
                                ]
                              ]
                          )
                      );

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('queryDocument')
                     ->with(
                         $this->equalTo(
                             'list_objects'
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $collection = new Collection(
            $protocolMock,
            'existing_collection',
            $schemaMock
        );
        $this->assertTrue($collection->existsInDatabase());
    }

    /**
     * Tests creation of the find operation.
     *
     * @return void
     */
    public function testFind()
    {
        $findOperation = $this->getMockedCollection()->find(null);
        $this->assertInstanceOf(Find::class, $findOperation);
    }

    /**
     * Tests creation of the add operation.
     *
     * @return void
     */
    public function testAdd()
    {
        $addOperation = $this->getMockedCollection()->add(['document'=>'data']);
        $this->assertInstanceOf(Add::class, $addOperation);
    }

    /**
     * Tests creation of the modify operation.
     *
     * @return void
     */
    public function testModify()
    {
        $modifyOperation = $this->getMockedCollection()->modify(['_id'=>1010]);
        $this->assertInstanceOf(Modify::class, $modifyOperation);
    }

    /**
     * Tests creation of the modify operation.
     *
     * @return void
     */
    public function testRemove()
    {
        $modifyOperation = $this->getMockedCollection()->remove(['_id'=>1010]);
        $this->assertInstanceOf(Remove::class, $modifyOperation);
    }

    /**
     * Tests if the collection exists in the database
     *
     * @return void
     */
    public function testDrop()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $schemaMock = $this->getMockBuilder(Schema::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $protocolMock->expects($this->once())
                     ->method('queryDocument')
                     ->with(
                         $this->equalTo(
                             'drop_collection'
                         ),
                         [
                            null,
                            'existing_collection'
                         ]
                     );

        $collection = new Collection(
            $protocolMock,
            'existing_collection',
            $schemaMock
        );

        $collection->drop();
    }

    private function getMockedCollection()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $schemaMock = $this->getMockBuilder(Schema::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        return new Collection(
            $protocolMock,
            'test_collection',
            $schemaMock
        );
    }
}
