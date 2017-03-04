<?php
namespace Kambo\Tests\Database\Protocolx\Unit;

use Kambo\Database\Protocolx\Collection;
use Kambo\Database\Protocolx\Table;
use Kambo\Database\Protocolx\Schema;

use Kambo\Database\Protocolx\Result\SqlResult;
use Kambo\Database\Protocolx\Adapter\Protocolx;

/**
 * Unit test for the Schema class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class SchemaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests get name from the schema.
     *
     * @return void
     */
    public function testGetName()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $schema = new Schema($protocolMock, 'test_database');

        $this->assertEquals('test_database', $schema->getName());
    }

    /**
     * Tests if the schema exists on the server.
     *
     * @return void
     */
    public function testExistsInDatabase()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will($this->returnValue([['field'=>'existing_schema']]));

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with(
                         $this->equalTo(
                             "SHOW DATABASES LIKE 'existing_schema'"
                         )
                     )
                     ->will($this->returnValue($sqlResultMock));

        $schema = new Schema($protocolMock, 'existing_schema');

        $this->assertTrue($schema->existsInDatabase());
    }

    /**
     * Tests if the schema exists on the server.
     *
     * @return void
     */
    public function testExistsInDatabaseSchemaNotExists()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will($this->returnValue([['field'=>'existing_schema']]));

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with(
                         $this->equalTo(
                             "SHOW DATABASES LIKE 'non_existing_schema'"
                         )
                     )
                     ->will($this->returnValue($sqlResultMock));

        $schema = new Schema($protocolMock, 'non_existing_schema');

        $this->assertFalse($schema->existsInDatabase());
    }

    /**
     * Tests get collection
     *
     * @return void
     */
    public function testGetCollection()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $schema     = new Schema($protocolMock, 'existing_schema');
        $collection = $schema->getCollection('existing_collection');

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * Tests get collection with check if the collection exists.
     *
     * @return void
     */
    public function testGetCollectionWithValidation()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will(
                          $this->returnValue(
                              [
                                [
                                    'type'=>'COLLECTION',
                                    'name'=>'existing_collection'
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

        $schema     = new Schema($protocolMock, 'existing_schema');
        $collection = $schema->getCollection(
            'existing_collection',
            [
                'validateExistence' => true
            ]
        );

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * Tests get collection with check if the collection exists. Collection
     * does not exists, thus an exception should be thrown.
     *
     * @return void
     *
     * @expectedException InvalidArgumentException
     */
    public function testGetCollectionWithValidationNonExisting()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will(
                          $this->returnValue([])
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

        $schema     = new Schema($protocolMock, 'non_existing_schema');
        $collection = $schema->getCollection(
            'existing_collection',
            [
                'validateExistence' => true
            ]
        );
    }

    /**
     * Tests getting all available collections from the schema.
     *
     * @return void
     */
    public function testGetCollections()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will(
                          $this->returnValue(
                              [
                                [
                                    'type'=>'TABLE',
                                    'name'=>'table'
                                ],
                                [
                                    'type'=>'COLLECTION',
                                    'name'=>'collection'
                                ],
                                [
                                    'type'=>'COLLECTION',
                                    'name'=>'collection2'
                                ],
                              ]
                          )
                      );

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with(
                         $this->equalTo(
                             'USE test_schema'
                         )
                     )->will(
                         $this->returnValue([])
                     );
        $protocolMock->expects($this->once())
                     ->method('queryDocument')
                     ->with(
                         $this->equalTo(
                             'list_objects'
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $schema = new Schema($protocolMock, 'test_schema');

        $collections = $schema->getCollections();

        $this->assertInternalType('array', $collections);
        $this->assertEquals(2, count($collections)); // use assertCount ?
        $this->assertInstanceOf(Collection::class, $collections[0]);
        $this->assertInstanceOf(Collection::class, $collections[1]);
    }

    /**
     * Tests creating collection in the schema.
     *
     * @return void
     */
    public function testCreateCollection()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('queryDocument')
                     ->with(
                         $this->equalTo(
                             "create_collection"
                         ),
                         $this->equalTo(
                             [
                                'test_schema',
                                'new_collection'
                             ]
                         )
                     );

        $schema     = new Schema($protocolMock, 'test_schema');
        $collection = $schema->createCollection('new_collection');

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * Tests getting all available tables from the schema.
     *
     * @return void
     */
    public function testGetTables()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will(
                          $this->returnValue(
                              [
                                [
                                    'type'=>'TABLE',
                                    'name'=>'table'
                                ],
                                [
                                    'type'=>'COLLECTION',
                                    'name'=>'collection'
                                ],
                                [
                                    'type'=>'COLLECTION',
                                    'name'=>'collection2'
                                ],
                              ]
                          )
                      );

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with(
                         $this->equalTo(
                             'USE test_schema'
                         )
                     )->will(
                         $this->returnValue([])
                     );
        $protocolMock->expects($this->once())
                     ->method('queryDocument')
                     ->with(
                         $this->equalTo(
                             'list_objects'
                         )
                     )->will(
                         $this->returnValue($sqlResultMock)
                     );

        $schema = new Schema($protocolMock, 'test_schema');

        $tables = $schema->getTables();

        $this->assertInternalType('array', $tables);
        $this->assertEquals(1, count($tables)); // use assert count?
        $this->assertInstanceOf(Table::class, $tables[0]);
    }

    /**
     * testGetTable
     *
     * @return void
     */
    /*public function testGetTable()
    {
        $this->markTestIncomplete(
          'Tables has not been implemented yet.'
        );
        $schema = $this->getSchemaForTest('test_database');
        $table  = $schema->getTable('test_table');

        $this->assertInstanceOf(Collection::class, $table);
    }*/

    /**
     * testCreateCollection
     *
     * @return void
     */
    /*public function testDropTable()
    {
        $this->markTestIncomplete(
          'Tables has not been implemented yet.'
        );
        $schema     = $this->getSchemaForTest('test_database');
        $collection = $schema->dropTable('delete_table');

        $connectionConfig = $this->getDatabaseConfig();
        $fetchedRows      = $this->databaseFetch("SHOW TABLES IN ".$connectionConfig['database']);

        $tables = [];
        foreach ($fetchedRows as $row) {
            $tables[] = reset($row);
        }

        $this->assertEquals(['test_collection', 'test_table'], $tables);
    }*/
}
