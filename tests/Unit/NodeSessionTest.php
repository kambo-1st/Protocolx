<?php
namespace Kambo\Tests\Database\Protocolx\Unit;

use Kambo\Database\Protocolx\Schema;
use Kambo\Database\Protocolx\NodeSession;

use Kambo\Database\Protocolx\Result\SqlResult;
use Kambo\Database\Protocolx\Adapter\Protocolx;

/**
 * Unit test for the NodeSession class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class NodeSessionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test creating schema in the database
     *
     * @return void
     */
    public function testCreateSchema()
    {
        $testingSchemaName = 'test_schema';

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with($this->equalTo('CREATE DATABASE test_schema'));

        $nodeSession = new NodeSession($protocolMock);
        
        $schema = $nodeSession->createSchema($testingSchemaName);

        $this->assertInstanceOf(Schema::class, $schema);
    }

    /**
     * Tests droping schema in the database.
     *
     * @return void
     */
    public function testDropSchema()
    {
        $testingSchemaName = 'test_schema';

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with($this->equalTo('DROP DATABASE test_schema'));

        $nodeSession = new NodeSession($protocolMock);
        $nodeSession->dropSchema($testingSchemaName);
    }

    /**
     * Tests get schema from the database.
     *
     * @return void
     */
    public function testGetSchema()
    {
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $nodeSession = new NodeSession($protocolMock);
        $schema      = $nodeSession->getSchema('test_database');

        $this->assertInstanceOf(Schema::class, $schema);
    }

    /**
     * Tests get schemas from the database.
     *
     * @return void
     */
    public function testGetSchemas()
    {
        $sqlResultMock = $this->getMockBuilder(SqlResult::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $sqlResultMock->expects($this->once())
                      ->method('fetchAll')
                      ->will($this->returnValue(['schema', 'schema2']));

        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with($this->equalTo('SHOW DATABASES'))
                     ->will($this->returnValue($sqlResultMock));

        $nodeSession = new NodeSession($protocolMock);
        $schemas     = $nodeSession->getSchemas();

        $this->assertInternalType('array', $schemas);
        $this->assertCount(2, $schemas);
        $this->assertInstanceOf(Schema::class, $schemas[0]);
        $this->assertInstanceOf(Schema::class, $schemas[1]);
    }

    /**
     * Tests executing SQL query.
     *
     * @return void
     */
    public function testSql()
    {
        $testingSql   = 'SELECT * FROM foo';
        $protocolMock = $this->getMockBuilder(Protocolx::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $protocolMock->expects($this->once())
                     ->method('query')
                     ->with($this->equalTo($testingSql))
                     ->will($this->returnValue([['foo'=>'bar']]));

        $nodeSession = new NodeSession($protocolMock);
        $queryResult = $nodeSession->sql($testingSql);

        $this->assertInternalType('array', $queryResult);
        $this->assertEquals([['foo'=>'bar']], $queryResult);
    }
}
